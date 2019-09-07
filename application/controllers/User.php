<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent:: __construct();

        //Library
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload'); 
        $this->load->library('pagination');

        //Model
        $this->load->model('get_model');
        $this->load->model('user_model');

        //helper
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index(){

        $data['username'] = '';

        if($this->session->userdata('id_role') == 1) {
            $data['isActive'] = 4; 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['user'] = $this->get_model->getUser();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('user/get_user',$data);
            $this->load->view('templates/footer_admin'); 
        }  
        else if ($this->session->userdata('id_role') == 2){
            redirect('Dashboard');    
        }
        else{
            redirect('Login');
        }   
        
    }

    public function addUser(){
        if($this->session->userdata('id_role') == 1) {
            $this->user_model->addUser();
            redirect('User');
        }  
        else{
            redirect('Dashboard');    
        }
    }

    public function banUser($id_user){
        if($this->session->userdata('id_role') == 1) {
            $this->user_model->banUser($id_user);
            redirect('User');
        }  
        else{
            redirect('Dashboard');    
        }
    }

    public function activeUser($id_user){
        if($this->session->userdata('id_role') == 1) {
            $this->user_model->activeUser($id_user);
            redirect('User');
        }  
        else{
            redirect('Dashboard');    
        }
    }

    public function deleteUser($id_user){
        if($this->session->userdata('id_role') == 1) {
            $this->user_model->deleteUser($id_user);
            redirect('User');
        }  
        else{
            redirect('Dashboard');    
        }
    }

    public function logOut(){
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function getUserById(){
        if($this->session->userdata('id_role') == 1) {
            $id_user = $this->input->post('id_user');
            $records = $this->get_model->getUserById($id_user);
            $output = '';
            foreach($records as $row){
                $output .= '
                    <input type="hidden" name="id_user" value="'.$row["id_user"].'">
                    <div class="form-group">
                        <label class="lbl-edit">Username</label>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="'.$row["username"].'">
                    </div>
                    <div class="form-group">
                        <label class="lbl-edit">Password</label>
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="lbl-edit">Nama</label>
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama" value="'.$row["name"].'">
                    </div>';
            }
            echo $output;
        }  
        else{
            $output = 'Akun ada tidak dapat mengubah User';
            echo $output;    
        }
    }

    public function editUser(){
        if($this->session->userdata('id_role') == 1) {
            $this->user_model->editUser();
            redirect('User');
        }  
        else{
            redirect('Dashboard');    
        }
    }

}
