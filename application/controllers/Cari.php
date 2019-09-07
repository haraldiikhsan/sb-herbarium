<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

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
		if($this->input->post('id_familia') || $this->input->post('genus') || $this->input->post('species')){
			$data = array(
	            'id_familia' => $this->input->post('id_familia'),
	            'genus' => $this->input->post('genus'),
	            'species' => $this->input->post('species')
	        );
	        $this->session->set_userdata($data);
		}
		else if ($this->session->userdata('id_familia') || $this->session->userdata('genus') || $this->session->userdata('species')){
			$data = array(
	            'id_familia' => $this->session->userdata('id_familia'),
	            'genus' => $this->session->userdata('genus'),
	            'species' => $this->session->userdata('species')
	        );
		}
        else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Masukkan data pencarian</div>');
            redirect('/');
        }

		//Pagination Configuration
        $config['base_url'] = site_url('Cari/index');
        $config['total_rows'] = $this->get_model->getCountSearchHerbarium($data);
        $config['per_page'] = 9;
        $config["uri_segment"] = 3; 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        //Pagination Style Bootstrap
    	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['limit'] = $config['per_page'];        
 
        $response['pagination'] = $this->pagination->create_links();
		$response['herbarium'] = $this->get_model->getSearchHerbarium($data);

        $response['username'] = '';

        if($this->session->userdata('id_user')) { 
            $response['username'] = $this->session->userdata('username');
        }

		$this->load->view('templates/header',$response);
		$this->load->view('cari',$response);
		$this->load->view('templates/footer');
	}

    public function getHerbariumById(){
        $id_herbarium = $this->input->post('id_herbarium');
        $records = $this->get_model->getHerbariumById($id_herbarium);
        $output = '';
        foreach($records as $row){
            $output .= '
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Nama Spesies</label>
                <div class="form-view"><i>'.$row["species"].'</i></div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Nama Genus</label>
                <div class="form-view"><i>'.$row["genus"].'</i></div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name"  for="catatan">Nama Famili</label>
                <div class="form-view"><i>'.$row["familia"].'</i></div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Nama Lokal</label>
                <div class="form-view">'.$row["local_name"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Gambar Herbarium</label>
                <div class="form-view">
                    <img class="img-collection" id="r_pic" src="'.base_url('assets/images/herbarium/'.$row['herbarium_pic']).'">
                </div>
            </div>';
            if ($row['real_pic']) {
                $output .= '
                <div class="form-group mb-1">
                    <label class="lbl-name" for="catatan">Gambar Tegakan Pohon</label>
                    <div class="form-view">
                        <img class="img-collection" id="r_pic" src="'.base_url('assets/images/real/'.$row['real_pic']).'">
                    </div>
                </div>';
            }
            $output .= '
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Morfologi</label>
                <div class="form-view">'.$row["leaf_morphology"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">No Koleksi</label>
                <div class="form-view">'.$row["collection_num"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Tanggal Koleksi</label>
                <div class="form-view">'.$row['collection_date'].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Lokasi</label>';
            if($row["location"]){
                $output .= '
                <div class="form-view">'.$row["location"].'</div>';
            }
            else{
                $output .= '
                <div class="form-view">-</div>';
            }
            $output .= '
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Tipe Habitat</label>
                <div class="form-view">'.$row["habitat_type"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Kolektor</label>
                <div class="form-view">'.$row["collector"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Identifikator</label>
                <div class="form-view">'.$row["identifier"].'</div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Catatan Lain</label>';
            if($row["notes"]){
                $output .= '
                <div class="form-view">'.$row["notes"].'</div>';
            }
            else{
                $output .= '
                <div class="form-view">-</div>';
            }
            $output .= '
            </div>'
            ;
        }
        echo $output;
    }
}
