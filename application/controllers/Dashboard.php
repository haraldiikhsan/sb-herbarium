<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

        //helper
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index(){

        $data['username'] = '';

        if($this->session->userdata('id_user')) { 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['isActive'] = 1;
            $data['total_famili'] = $this->get_model->getCountAllFamili();
            $data['total_herbarium'] = $this->get_model->getCountAllHerbarium();
            $data['total_user'] = $this->get_model->getCountAllActiveUSer();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('dashboard',$data);
            $this->load->view('templates/footer_admin'); 
        }  
        else {
            redirect('Login');    
        }   
        
    }

    public function logOut(){
        $this->session->sess_destroy();
        redirect('Login');
    }

}
