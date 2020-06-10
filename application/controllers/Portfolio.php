<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Profile_model');
        $this->load->model('About_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Contact_model');
    }

    public function index() {
        $data['profiles'] = $this->Profile_model->getAllProfile();
        $data['abouts'] = $this->About_model->getAllAbout();
        $data['portfolios'] = $this->Portfolio_model->getAllPortfolio();
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'required');
         
        if ( $this->form_validation->run() == FALSE ) {
            # code...
            $data['title'] = "My Portfolio";
            $this->load->view('portfolio/index', $data);
        } else {
            # code...
            $this->Contact_model->addDataContact();
            $this->session->set_flashdata('flash', 'Your <b>Message</b> has been <b>send successfully!</b>');
            redirect('portfolio');
        }
    }
}