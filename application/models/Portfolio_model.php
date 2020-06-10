<?php 

Class Portfolio_model extends CI_Model {
    public function getAllPortfolio() {
        return $this->db->get('portfolio')->result_array();
    }

    public function getPortfolioById($id) {
        return $this->db->get_where('portfolio', ['id' => $id])->row_array();
    }

    public function addDataPortfolio() {

        $upload_image = $_FILES['portfolio']['name'];
        
        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5048';
            $config['upload_path'] = './assets/img/imagePortfolio';

            $this->load->library('upload', $config);

            if( $this->upload->do_upload('portfolio') ) {
                $new_image = $this->upload->data('file_name');
                // $this->db->set('portfolio', $new_image);

                $data = [
                    'portfolio_image' => $new_image,
                    'name'            => $this->input->post('name', true)
                ];

                $this->db->insert('portfolio', $data);
            } else {
                $this->session->set_flashdata('flash', 'Your image <b>failed to uploade!</b>');
                redirect('adminPortfolio');
                exit;
            }
        }
    }

    public function editDataPortfolio() {

        $data = [
            'name' => $this->input->post('name', true)
        ];

        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('portfolio', $data);
    }

    public function deleteDataPortfolio($id) {
        $this->db->where('id', $id);
        $this->db->delete('portfolio');
    }
}