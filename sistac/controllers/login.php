<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('loginModel');
  }

  function index(){
    if($this->session->userdata('user')){
      $this->validate();
    }else{
      $this->load->helper('form');
      $this->load->view('include/header');
      $this->load->view('loginView');
      $this->load->view('include/footer');
    }    
  }

  function validate() {
    if($this->session->userdata('user')){
      $user = $this->session->userdata('user');
    }else{
      if($this->input->post('username') && $this->input->post('password')){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->loginModel->validate($username, $password);

        $this->session->set_userdata(array('user' => $user));
      }else{
        redirect('home', 'refresh');
      }      
    }

    if($user){
      switch ($user->codTipoUsuario){
        case 1:
        redirect('administrador', 'refresh');
        break;
        case 2:
        redirect('gerente', 'refresh');
        break;
        case 3:
        redirect('coordenador', 'refresh');
        break;
        case 4:
        redirect('aluno', 'refresh');
        break;
        default:
        redirect('login', 'refresh');
      }
    }else{
      redirect('login', 'refresh');
    }
  }

}
