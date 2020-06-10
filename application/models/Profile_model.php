<?php 

Class Profile_model extends CI_Model {
    public function getAllProfile() {
        return $this->db->get('profile')->result_array();
    }

    public function getProfileById($id) {
        return $this->db->get_where('profile', ['id' => $id])->row_array();
    }

    public function updateDataProfile() {
        
        $data = [
            'name' => $this->input->post('name', true),
            'profession' => $this->input->post('profession', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('profile', $data);
    }
}

?>