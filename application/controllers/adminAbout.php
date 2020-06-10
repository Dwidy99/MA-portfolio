<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAbout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('About_model');
    }
    
    public function index() {
        $data['title'] = "About Page";
        $data['abouts'] = $this->About_model->getAllAbout();

        $this->load->view('admin/adminTemplates/header', $data);
        $this->load->view('admin/about/index', $data);
        $this->load->view('admin/adminTemplates/footer');
    }

    public function editAbout($id = null) {
        $data['title'] = "About Edit Page";
        $data['about'] = $this->About_model->getAboutById($id);

        // ambil data portfolio berdasarkan id
        $idAbout = $this->db->get_where('about', ['id' => $id])->row_array();

        // cek apakah id nya ada
        if( !$idAbout ) {
            redirect('auth/blocked');
        }

        $this->form_validation->set_rules('about', 'About', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/adminTemplates/header', $data);
            $this->load->view('admin/about/editAbout', $data);
            $this->load->view('admin/adminTemplates/footer');
        } else {
            # code...

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        // if( empty($upload_image) ) {
            
        //     // cek apakah gambarnya kosong
        //     $this->form_validation->set_rules('image', 'Image', 'required');
        // }
        
        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/imageAbout';

            $this->load->library('upload', $config);

            if( $this->upload->do_upload('image') ) {
                $old_image = $data['about']['image'];
                if($old_image != 'activity.jpg') {
                    unlink(FCPATH . 'assets/img/imageAbout/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $this->session->set_flashdata('flash', 'Your image <b>failed to uploade!</b>');
                redirect('adminAbout');
                exit;
            }
        }

            $this->About_model->updateDataAbout();
            $this->session->set_flashdata('flash', 'Your data has been update <b>successfully!</b>');
            redirect('adminAbout');
        }
    }
}