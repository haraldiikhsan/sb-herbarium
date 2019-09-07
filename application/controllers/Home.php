<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
		if ($this->session->userdata('id_familia') || $this->session->userdata('genus') || $this->session->userdata('species')){
			$this->session->unset_userdata('id_familia');
			$this->session->unset_userdata('genus');
			$this->session->unset_userdata('species');
		}

		$data['username'] = '';
		$data['familia'] = $this->get_model->getFamili();

		if($this->session->userdata('id_user')) { 
            $data['username'] = $this->session->userdata('username');
        }

		$this->load->view('templates/header',$data);
		$this->load->view('home',$data);
		$this->load->view('templates/footer');
	}

}
