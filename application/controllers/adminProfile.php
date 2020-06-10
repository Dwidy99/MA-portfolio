<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Profile_model');
    }

    public function index() {
        $data['title'] = "Profile Page";

        $data['profiles'] = $this->Profile_model->getAllProfile();
        $this->load->view('admin/adminTemplates/header', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('admin/adminTemplates/footer');
    }
    
    public function edit($id = null) {
        $data['title'] = "Profile Edit Page";
        $data['profile'] = $this->Profile_model->getProfileById($id);

        // ambil data portfolio berdasarkan id
        $idProfile = $this->db->get_where('profile', ['id' => $id])->row_array();

        // cek apakah id nya ada
        if( !$idProfile ) {
            redirect('auth/blocked');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('profession', 'Profession', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/adminTemplates/header', $data);
            $this->load->view('admin/profile/editProfile', $data);
            $this->load->view('admin/adminTemplates/footer');
        } else {
            # code...

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['photo']['name'];

        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10048';
            $config['upload_path'] = './assets/img/imageProfilex';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('photo')) {
                $old_photo = $data['profile']['photo'];
                if($old_photo != 'user.png') {
                    unlink(FCPATH . 'assets/img/imagePortfolio/' . $old_photo);
                }

                $new_photo = $this->upload->data('file_name');
                $this->db->set('photo', $new_photo);
            } else {
                $this->session->set_flashdata('flash', 'Your photo <b>failed to uploade!</b>');
                redirect('adminProfile');
                exit;
            }
        }

            $this->Profile_model->updateDataProfile();
            $this->session->set_flashdata('flash', 'Your data has been update <b>successfully!</b>');
            redirect('adminProfile');
        }
        
    }

}