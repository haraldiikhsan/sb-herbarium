<?php

class Herbarium_model extends CI_Model {

    private function herbariumImage(){
     
        $config['upload_path']          =  './assets/images/herbarium';
        $config['allowed_types']        =  'jpg|png|jpeg';
        $config['file_name']            =  uniqid();
        $config['overwrite']            =  true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('herbarium_image')) {
            return $this->upload->data("file_name");
        } else {
            return "default.jpg";
        }
        
    }

    private function realImage(){
        $config['upload_path']          = './assets/images/real';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('real_image')) {
            return $this->upload->data("file_name");
        } else {
            return "default.jpg";
        }   
    }

    private function herbariumImageUpdate(){
     
        $config['upload_path']          =  './assets/images/herbarium';
        $config['allowed_types']        =  'jpg|png|jpeg';
        $config['file_name']            =  uniqid();
        $config['overwrite']            =  true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('herbarium_image')) {
            return $this->upload->data("file_name");
        } else {
            return $this->input->post('old_herbariumPic');
        }
        
    }

    private function realImageUpdate(){
        $config['upload_path']          = './assets/images/real';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('real_image')) {
            return $this->upload->data("file_name");
        } else {
            return $this->input->post('old_realPic');
        }   
    }

    public function addHerbarium(){

        $data = array(
            'id_familia' => $this->input->post('id_familia'),
            'id_user' => $this->session->userdata('id_user'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'local_name' => $this->input->post('local_name'),
            'leaf_morphology' => $this->input->post('leaf_morphology'),
            'herbarium_pic' => $this->herbariumImage(),
            'real_pic' => $this->realImage(),
            'collection_num' => $this->input->post('collection_num'),
            'collection_date' => $this->input->post('collection_date'),
            'location' => $this->input->post('location'),
            'habitat_type' => $this->input->post('habitat_type'),
            'collector' => $this->input->post('collector'),
            'identifier' => $this->input->post('identifier'),
            'notes' => $this->input->post('notes'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        // Add Herbarium
        foreach( $data as $key=>$value ){
            if(trim($value)!= ""){
               $this->db->set($key, $value);
            }
        } 
        $this->db->insert('herbarium');

        // Update Famili
        $this->db->where('id_familia', $data['id_familia']);
        $this->db->set('total_herbarium', 'total_herbarium + 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');
    }

    public function updateHerbarium() {

        $id_herbarium = $this->input->post('id_herbarium');
        $old_idFamilia = $this->input->post('old_idFamilia');

        $data = array(
            'id_familia' => $this->input->post('id_familia'),
            'id_user' => $this->session->userdata('id_user'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'local_name' => $this->input->post('local_name'),
            'leaf_morphology' => $this->input->post('leaf_morphology'),
            'herbarium_pic' => $this->herbariumImageUpdate(),
            'real_pic' => $this->realImageUpdate(),
            'collection_num' => $this->input->post('collection_num'),
            'collection_date' => $this->input->post('collection_date'),
            'location' => $this->input->post('location'),
            'habitat_type' => $this->input->post('habitat_type'),
            'collector' => $this->input->post('collector'),
            'identifier' => $this->input->post('identifier'),
            'notes' => $this->input->post('notes'),
            'updated_at' => date("Y-m-d H:i:s")
        );

        // Update Herbarium
        foreach( $data as $key=>$value ){
            if(trim($value)!= ""){
               $this->db->set($key, $value);
            }
        }
        $this->db->where('id_herbarium', $id_herbarium);     
        $this->db->update('herbarium');
        
        if (!($old_idFamilia == $data['id_familia'])) {
            //update count herbarium
            $this->db->where('id_familia', $data['id_familia']);
            $this->db->set('total_herbarium', 'total_herbarium + 1', FALSE);
            $this->db->set('updated_at', 'NOW()', FALSE);
            $this->db->update('familia');

            // delete latest famili count
            $this->db->where('id_familia', $old_idFamilia);
            $this->db->set('total_herbarium', 'total_herbarium - 1', FALSE);
            $this->db->set('updated_at', 'NOW()', FALSE);
            $this->db->update('familia');
        }     

    }

    public function deleteHerbarium($id_herbarium,$id_familia){

        // Update Familia Total
        $this->db->where('id_familia', $id_familia);
        $this->db->set('total_herbarium', 'total_herbarium - 1', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->update('familia');

        //Delete Herbarium
        $this->db->delete('herbarium', array("id_herbarium" => $id_herbarium));

    }

}


?>