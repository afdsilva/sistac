<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coordenador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('coordenadorModel');
        $this->load->model('statusModel');
        /*$this->load->model('pedidoModel');
        $this->load->model('atividadeModel');
        $this->load->model('categoriaModel');
        $this->load->model('tipoAtividadeModel');
        $this->load->model('unidadeModel');
    */}
    
    function index() {
        if ($this->session->userdata('user') == true) {
            if ($this->session->userdata('user')->codTipoUsuario == 3) {
                $data['status'] = $this->statusModel->getStatus();
                $this->load->view('include/header');
                $this->load->view('coordenador/coordenadorView', $data);
                $this->load->view('include/footer');
            } else {
                $this->redirect('login', 'refresh');
            }
        } else {
            $this->redirect('login', 'refresh');
        }
    }
}
