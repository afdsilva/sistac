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
    $this->load->model('TipoUsuarioModel');
  }

  function index(){
    if($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 1){
      $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST,$_GET);
      $data['tipoUsuario'] = $this->TipoUsuarioModel->getTipoUsuarios($_POST,$_GET);

      $data['logged'] = true;

      $this->navigation['navigation']['administrador'] = 'Administrador';

      $this->load->view('include/header', $data);
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

  function editar($usuarioId = false) {
    if($usuarioId && $this->session->userdata('user')->codTipoUsuario == 1){
        $data['logged'] = true;
        $data['usuario'] = $this->usuarioModel->getUsuarioByCPF($usuarioId);
        $data['cursos'] = $this->cursoModel->getCursos();
        $data['tipoUsuario'] = $this->TipoUsuarioModel->getTipoUsuarios();

        $this->navigation['navigation']['administrador'] = 'Administrador';
        $this->navigation['navigation']['administrador/editar'] = array('name' => 'Editar', 'active' => true);
        $this->navigation['navigation']['administrador/editar/' . $usuarioId] = $usuarioId;

        $this->load->view('include/header', $data);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('administrador/administradorEditarView', $data);
        $this->load->view('include/footer');
      } else {
        redirect('login', 'refresh');
      }
}
       

  function cadastrar() {
    if ($this->session->userdata('user')->codTipoUsuario == 1) {
      $data['cursos'] = $this->cursoModel->getCursos();
      $data['tipoUsuario'] = $this->TipoUsuarioModel->getTipoUsuarios();
      $this->load->view('include/header');
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('administrador/administradorView',$data);
      $this->load->view('include/footer');
    } else {
      $this->redirect('home', 'refresh');
    }
  }

  function salvar(){ //opcao: 0 para cadastrar; 1 para editar
    echo("foi");
    $usuario['nome'] = $_POST['nome'];
    $usuario['cpf'] = $_POST['cpf'];
    $usuario['curso'] = $_POST['curso'];
    $usuario['email'] = $_POST['email'];
    $usuario['codTipoUsuario'] = $_POST['codTipoUsuario'];
    //if($opcao==0){
        $usuario['senha'] = $_POST['senha'];
        
        $ret=true; //teste
        //$ret = $this->usuarioModel->inserir($usuario);
    //}
    //else{
        //$ret = $this->usuarioModel->update($usuario);

    //}

    if($ret == true){
      echo 'sucesso';
    } else {
      echo 'falha';
    }
  }
}
