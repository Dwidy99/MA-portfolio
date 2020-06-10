<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPortfolio extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->model('Portfolio_model');
    }

    public function index() {
        $data['title'] = "Portfolio Page";
        $data['portfolios'] = $this->Portfolio_model->getAllPortfolio();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/adminTemplates/header', $data);
            $this->load->view('admin/portfolio/index', $data);
            $this->load->view('admin/adminTemplates/footer');
        } else {
            # code...
            $this->Portfolio_model->addDataPortfolio();
            $this->session->set_flashdata('flash', 'Your data has been added <b>successfully!</b>');
            redirect('adminPortfolio');
        }
        

    }

    public function editPortfolio($id = null) {
        $data['title'] = 'Edit Portfolio Page';
        $data['portfolio'] = $this->Portfolio_model->getPortfolioById($id);

        // ambil data portfolio berdasarkan id
        $idPortfolio = $this->db->get_where('portfolio', ['id' => $id])->row_array();

        // cek apakah id nya ada
        if( !$idPortfolio ) {
            redirect('auth/blocked');
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/adminTemplates/header', $data);
            $this->load->view('admin/portfolio/editPortfolio');
            $this->load->view('admin/adminTemplates/footer');
        } else {
            # code...

            // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['new_portfolioImage']['name'];

        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5048';
            $config['upload_path'] = './assets/img/imagePortfolio';

            $this->load->library('upload', $config);

            if( $this->upload->do_upload('new_portfolioImage') ) {
                $old_image = $data['portfolio']['portfolio_image'];
                if($old_image) {
                    unlink(FCPATH . 'assets/img/imagePortfolio/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('portfolio_image', $new_image);
            } else {
                $this->session->set_flashdata('flash', 'Your image <b>failed to uploade!</b>');
                redirect('adminPortfolio');
                exit;
            }
        }

        $this->Portfolio_model->editDataPortfolio();
        $this->session->set_flashdata('flash', 'Your data has been updated <b>successfully!</b>');
        redirect('adminPortfolio');
        }
    }

    public function deletePortfolio($id = null) {

        // ambil data portfolio berdasarkan id
        $idPortfolio = $this->db->get_where('portfolio', ['id' => $id])->row_array();

        // cek apakah id nya ada
        if( !$idPortfolio ) {
            redirect('auth/blocked');
        }

        $data['portfolio'] = $this->Portfolio_model->getPortfolioById($id);
        $old_image = $data['portfolio']['portfolio_image'];
            if($old_image) {
                unlink(FCPATH . 'assets/img/imagePortfolio/' . $old_image);
            }
        $this->Portfolio_model->deleteDataPortfolio($id);
        $this->session->set_flashdata('flash', 'Your data has been <b>deleted successfully!</b>');
        redirect('adminPortfolio');
    }
}