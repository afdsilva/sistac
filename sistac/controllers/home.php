<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        if($this->session->userdata('user')){
            $data['logged'] = true;
            $data['tipoUsuario'] = $this->session->userdata('user')->codTipoUsuario;
            $this->load->view('include/header', $data);
            $this->load->view('homeView');
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header');
            $this->load->view('homeView');
            $this->load->view('include/footer');
        
            
        }
        
        }
    
    function equipe(){
        
        $this->load->view('include/header');
        $this->load->view('equipeView');
        $this->load->view('include/footer');
    }
}