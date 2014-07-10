<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Coordenador extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('coordenadorModel');
    $this->load->model('statusModel');
    $this->load->model('pedidoModel');
  }

  function index(){
    if($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 3){
      $data['logged'] = true;
      $data['status'] = $this->statusModel->getStatus();

      $this->navigation['navigation']['coordenador'] = 'Coordenador';

      $this->load->view('include/header',$data);
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('coordenador/coordenadorView', $data);
      $this->load->view('include/footer');
    } else {
      $this->redirect('login', 'refresh');
    }
  }

  function listaPedidos() {
    print json_encode($this->pedidoModel->getPedidos($_POST, $_GET));
  }

}
