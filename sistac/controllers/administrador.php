<?php

if (!defined('BASEPATH')){
  exit('No direct script access allowed');
}    

class Administrador extends CI_Controller {

  var $navigation = array('navigation' => array('administrador' => 'Administrador'));
  var $data = array('erro' => '', 'usuario' => '');

  public function __construct() {
    parent::__construct();
    $this->load->model('usuarioModel');
    $this->load->model('cursoModel');
    $this->load->model('tipoUsuarioModel');
  }

  function index(){
    if($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 1){
      $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST,$_GET);
      $this->data['logged'] = true;

      $this->navigation['navigation']['administrador'] = 'Administrador';

      $this->load->view('include/header', $this->data);
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('administrador/administradorFiltroView', $data);
      $this->load->view('include/footer');

    }else{
      $this->redirect('login', 'refresh');
    }
  }

  function listaUsuarios(){
    print json_encode($this->usuarioModel->getUsuarios($_POST,$_GET));
  }

  function filtrar(){
    $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST,$_GET);
  }

  function editar() {
    if($this->session->userdata('user')->codTipoUsuario == 1){
      $data['usuario'] = $this->usuarioModel->getUsuarioByCPF($_POST["cpf"]);
      $data['cursos'] = $this->cursoModel->getCursos();
      $data['tipoUsuario'] = $this->tipoUsuarioModel->getTipoUsuarios();
      $this->data['logged'] = true;

      $this->load->view('include/header', $this->data);
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('administrador/administradorEditarView', $data);
      $this->load->view('include/footer');
    } else {
      $this->redirect('login', 'refresh');
    }
  }

  function cadastrar() {
    if ($this->session->userdata('user')->codTipoUsuario == 1) {
      $data['cursos'] = $this->cursoModel->getCursos();
      $data['tipoUsuario'] = $this->tipoUsuarioModel->getTipoUsuarios();
      $this->load->view('include/headerAreaRestrita');
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('administrador/administradorView',$data);
      $this->load->view('include/footer');
    } else {
      $this->redirect('home', 'refresh');
    }
  }

  function salvar(){
    $usuario['nome'] = $_POST['nome'];
    $usuario['cpf'] = $_POST['cpf'];
    $usuario['curso'] = $_POST['curso'];
    $usuario['email'] = $_POST['email'];
    $usuario['senha'] = $_POST['senha'];
    $usuario['codTipoUsuario'] = $_POST['codTipoUsuario'];

    $ret = $this->usuarioModel->inserir($usuario);

    if($ret == true){
      echo 'sucesso';
    } else {
      echo 'falha';
    }
  }
} 
