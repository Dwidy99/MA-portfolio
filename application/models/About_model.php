<?php 

Class About_model extends CI_Model {
    public function getAllAbout() {
        return $this->db->get('about')->result_array();
    }

    public function getAboutById($id) {
        return $this->db->get_where('about', ['id' => $id])->row_array();
    }

    public function updateDataAbout() {
        
        $data = [
            'about' => $this->input->post('about', true)
        ];

        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('about', $data);
        
    }
}