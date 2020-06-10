<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->model('Profile_model');
    }

    public function index() {
        $data['title'] = "Home Page";
        $data['profiles'] = $this->Profile_model->getAllProfile();

        $this->load->view('admin/adminTemplates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/adminTemplates/footer');
    }
}