<?php

class Familia_model extends CI_Model {

    public function addFamilia($familia) {
        if($familia){
            $id_user = $this->session->userdata('id_user');
            $data = array(
                'familia' => $familia,
                'id_user' => $id_user,
                'total_herbarium' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $this->db->insert('familia', $data);
        }
    }

    public function editFamilia(){
        $this->db->where('id_familia', $this->input->post('id_familia'));
        $this->db->update('familia', array('familia' => $this->input->post('familia')));
    }
}

?>