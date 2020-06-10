<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminContact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Contact_model');
    }

    public function index() {
        $data['title'] = 'Contact Page';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/adminTemplates/header', $data);
            $this->load->view('admin/contact/index', $data);
            $this->load->view('admin/adminTemplates/footer');
        } else {
            # code...
            $this->Contact_model->addDataContact();
            $this->session->set_flashdata('flash', 'Your <b>Message</b> has been <b>added successfully!</b>');
            redirect('adminContact');
        }

    }
}