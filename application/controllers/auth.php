<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() 
    {
        // cek apakah ada session nya
        if( $this->session->userdata('email') ) {
            redirect('adminHome');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'User Login';
            $this->load->view('auth/authTemplates/authHeader', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/authTemplates/authFooter');
        } else {
            # code...
            // validasinya sukses
            $this->_login();
        }
        
    }

    private function _login() {
        // Siapkan data
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika usernya ada
        if($user) {
            // cek password 
            if(password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email']
                ];

                $this->session->set_userdata($data);
                redirect('adminHome');
            } else {
                $this->session->set_flashdata('flash', '<b>Wrong Password!</b>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('flash', '<b>Email is Not Registered.</b> Please Registered!');
            redirect('auth');
        }
    }
    
    public function registration()
    {
        // cek apakah ada session nya
        if( $this->session->userdata('email') ) {
            redirect('adminHome');
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

        
        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'User Registration';
            $this->load->view('auth/authTemplates/authHeader', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/authTemplates/authFooter');
        } else {
            # code...
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->Auth_model->register($data);
            $this->session->set_flashdata('flash', '<b>Congratulation Your Account Has Been Created.</b> Please Login!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('flash', '<b>You Has Been Logged Out!.</b>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked!';
        $this->load->view('auth/blocked', $data);
    }
}