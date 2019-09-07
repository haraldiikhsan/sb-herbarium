<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Famili extends CI_Controller {

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
        $this->load->model('familia_model');
        $this->load->model('get_model');

        //helper
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index(){

        $data['username'] = '';

        if($this->session->userdata('id_role') == 1) {
            $data['isActive'] = 2; 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['familia'] = $this->get_model->getFamili();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('famili/get_famili',$data);
            $this->load->view('templates/footer_admin'); 
        }  
        else if ($this->session->userdata('id_role') == 2){
            redirect('Dashboard');    
        }
        else{
            redirect('Login');
        }   
        
    }

    public function addFamili(){
        // $this->form_validation->set_rules('familia', 'Familia', 'required|trim', [
        //     'required' => 'Nama Famili Tidak Boleh Kosong'
        // ]);
        // $this->form_validation->run();

        $familia = $this->input->post('familia');
        if($familia){
            $this->familia_model->addFamilia($familia);
            redirect('Famili');
        }
        else{
            redirect('Famili');   
        }
    }

    public function editFamilia(){
        if($this->session->userdata('id_role') == 1) {
            $this->familia_model->editFamilia();
            redirect('Famili');
        }  
        else{
            redirect('Dashboard');    
        }
    }

}
