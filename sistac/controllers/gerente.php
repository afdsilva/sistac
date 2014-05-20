<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gerente extends CI_Controller {
    
    public 
    
    function __construct() {
        parent::__construct();
        $this->load->model('alunoModel', 'alunomodel');
    }
    
    function index() {        
        $this->load->view('include/header');
        $this->load->view('GerenteView');
        $this->load->view('include/footer');
    }
}