<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('user_model');

        //helper
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index(){

        $data['username'] = '';

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
      
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);

        if($this->form_validation->run()) { 
            $this->onLogin(); 
        }
        elseif ($this->session->userdata('username')) {
            redirect('Dashboard');
        }  
        else {
            $this->load->view('templates/header',$data);
            $this->load->view('login');
            $this->load->view('templates/footer');      
        }   
        
    }

    public function onLogin() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => MD5($this->input->post('password'))
        );

        $response['login'] = $this->user_model->getLoginAuthentication($data);

        if($response['login']) {
            foreach ($response['login'] as $apps) {
                if ($apps->is_active == 1) {
                    $session_data = array(
                        'id_role'   => $apps->id_role,
                        'id_user' => $apps->id_user,
                        'username' => $apps->username,
                        'is_active' => $apps->is_active
                    );
                    $this->session->set_userdata($session_data);
                    redirect('Dashboard');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun anda tidak Aktif</div>');
                    redirect('Login');
                }
            }
        } 

        else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username / Password Salah !
            </div>');
            redirect('Login');
        }
    }

}
