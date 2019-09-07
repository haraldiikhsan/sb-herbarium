<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Herbarium extends CI_Controller {

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
        $this->load->model('herbarium_model');

        //helper
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');

    }

    public function index(){
        $data['username'] = '';

        if($this->session->userdata('id_user')) {
            $data['isActive'] = 3; 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['herbarium'] = $this->get_model->getHerbarium();
            $data['familia'] = $this->get_model->getFamili();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('herbarium/get_herbarium',$data);
            $this->load->view('templates/footer_admin'); 
        }
        else{
            redirect('Login');
        }   
        
    }

    public function addHerbarium(){
        $data['username'] = '';

        if($this->session->userdata('id_user')) {
            $data['isActive'] = 5; 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['familia'] = $this->get_model->getFamili();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('herbarium/add_herbarium',$data);
            $this->load->view('templates/footer_admin'); 
        }
        else{
            redirect('Login');
        } 
    }

    public function editHerbarium($id_herbarium){
        $data['username'] = '';

        if($this->session->userdata('id_user')) {
            $data['isActive'] = 5; 
            $data['username'] = $this->session->userdata('username');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['herbarium'] = $this->get_model->getHerbariumById($id_herbarium);
            $data['familia'] = $this->get_model->getFamili();

            $this->load->view('templates/header_admin',$data);
            $this->load->view('herbarium/edit_herbarium',$data);
            $this->load->view('templates/footer_admin'); 
        }
        else{
            redirect('Login');
        } 
    }

    public function updateHerbarium(){
        if($this->session->userdata('id_user')) {
            $this->herbarium_model->updateHerbarium();
            redirect('Herbarium');
        }
    }

    public function saveHerbarium(){

        if($this->session->userdata('id_user')) {
            $this->herbarium_model->addHerbarium();
            redirect('Herbarium');
        }
    }

    public function deleteHerbarium($id_herbarium,$id_familia){

        if($this->session->userdata('id_user')) {
            $this->herbarium_model->deleteHerbarium($id_herbarium,$id_familia);
            redirect('Herbarium');
        }
    }

    public function getHerbariumById(){
        $id_herbarium = $this->input->post('id_herbarium');
        $records = $this->get_model->getHerbariumById($id_herbarium);
        $output = '';
        foreach($records as $row){
            $output .= '
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Nama Spesies</label>
                <div class="form-view">';
                $row["species"] = explode(' ', $row["species"], 3);
                    foreach ($row["species"] as $key => $value) {
                        if ($key < 2) {
                            $output .= '<i>'.$value.' </i>';    
                        }
                        else{
                            $output .= $value.' '; 
                        }
                    }
            $output .= '    
                </div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name" for="catatan">Nama Genus</label>
                <div class="form-view"><i>'.$row["genus"].'</i></div>
            </div>
            <div class="form-group mb-1">
                <label class="lbl-name"  for="catatan">Nama Famili</label>
                <div class="form-view">'.$row["familia"].'</div>
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
