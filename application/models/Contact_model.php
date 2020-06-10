<?php 

Class Contact_model extends CI_Model {

    public function addDataContact() {

        $data = [
            'email' => $this->input->post('email', true),
            'name' => $this->input->post('name', true),
            'phone' => $this->input->post('phone', true),
            'message' => $this->input->post('message', true),
        ];

        $this->db->insert('contact', $data);
    }
}