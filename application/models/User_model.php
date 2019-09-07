<?php
    class User_model extends CI_Model {

        public function getLoginAuthentication($data){
            $this->db->select('id_user, id_role, username, is_active');
            $this->db->from('user');
            $this->db->where('username',$data['username']);
            $this->db->where('password',$data['password']);
            $query = $this->db->get(); 
            return $query->result();
        }

        public function addUser(){

            if ($this->session->userdata('id_role') == 1) {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => MD5($this->input->post('password')),
                    'name' => $this->input->post('name'),
                    'id_role' => '2',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                );

                $this->db->insert('user', $data);
            }
        }

        public function editUser(){

            if ($this->session->userdata('id_role') == 1) {
                $id_user = $this->input->post('id_user');
                $data = array(
                    'username' => $this->input->post('username'),
                    'name' => $this->input->post('name'),
                    'updated_at' => date("Y-m-d H:i:s")
                );

                if($this->input->post('password')){
                    $data['password'] = md5($this->input->post('password'));
                }

                $this->db->where('id_user', $id_user);
                $this->db->update('user', $data);
            }
        }

        public function banUser($id_user){
            $this->db->where('id_user', $id_user);
            $this->db->set('is_active', 0, FALSE);
            $this->db->set('updated_at', 'NOW()', FALSE);
            $this->db->update('user');
        }

        public function deleteUser($id_user){
            $this->db->where('id_user', $id_user);
            $this->db->set('is_delete', 1, FALSE);
            $this->db->set('updated_at', 'NOW()', FALSE);
            $this->db->update('user');
        }

        public function activeUser($id_user){
            $this->db->where('id_user', $id_user);
            $this->db->set('is_active', 1, FALSE);
            $this->db->set('updated_at', 'NOW()', FALSE);
            $this->db->update('user');
        }
        
    }
?>