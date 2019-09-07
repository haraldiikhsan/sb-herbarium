<?php
    class Get_model extends CI_Model {

        public function getFamili(){
            return $this->db->get('familia')->result_array();
        }

        public function getUser(){
            return $this->db->get_where('user', array('id_role' => 2, 'is_delete'=>0))->result_array();   
        }

        public function getHerbarium(){
            $this->db->select('herbarium.species, familia.familia, familia.id_familia, herbarium.id_herbarium, herbarium.leaf_morphology, herbarium.location, herbarium.collection_date, herbarium.collector ');
            $this->db->from('herbarium');
            $this->db->join('familia','familia.id_familia=herbarium.id_familia');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getSearchHerbarium($data){
            $this->db->select('*');
            $this->db->from('herbarium');
            $this->db->join('familia','herbarium.id_familia=familia.id_familia');
            if($data['id_familia']){
                $this->db->where('herbarium.id_familia',$data['id_familia']);
            }
            $this->db->like('herbarium.species', $data['species']);
            $this->db->like('herbarium.genus', $data['genus']);
            $this->db->limit($data['limit'],$data['page']);
	        $query = $this->db->get(); 
              
	        return $query->result_array();
        }

        public function getCountSearchHerbarium($data){
            $this->db->select('*');
            $this->db->from('herbarium');
            $this->db->join('familia','herbarium.id_familia=familia.id_familia');
            $this->db->where('herbarium.id_familia',$data['id_familia']);
            $this->db->like('herbarium.species', $data['species']);
            $this->db->like('herbarium.genus', $data['genus']);
	        $query = $this->db->get()->num_rows();
	        return $query;
        }

        public function getCountAllHerbarium(){
            return $this->db->get('herbarium')->num_rows();
        }

        public function getCountAllFamili(){
            return $this->db->get('familia')->num_rows();
        }

        public function getCountAllActiveUSer(){
            return $this->db->get_where('user', array('is_active' => 1,'id_role' => 2))->num_rows();
        }

        public function getHerbariumById($id_herbarium){
            $this->db->select('*');
            $this->db->where('id_herbarium',$id_herbarium);
            $this->db->join('familia','familia.id_familia=herbarium.id_familia');
            $query = $this->db->get('herbarium');
            return $query->result_array();
        }

        public function getUserById($id_user){
            $this->db->select('*');
            $this->db->where('id_user',$id_user);
            $query = $this->db->get('user');
            return $query->result_array();
        }

        
    }
?>