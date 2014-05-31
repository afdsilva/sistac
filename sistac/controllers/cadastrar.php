<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastrar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cursoModel');
        $this->load->model('usuarioModel');
    }

    function index() {
        $data['cursos'] = $this->cursoModel->getCursos();
        $this->load->view('include/header');
        $this->load->view('cadastroView', $data);
        $this->load->view('include/footer');
    }

    function salvar(){
        
        $usuario['nome'] = $_POST['nome'];
        $usuario['cpf'] = $_POST['cpf'];
        $usuario['curso'] = $_POST['curso'];
        $usuario['email'] = $_POST['email'];
        $usuario['senha'] = $_POST['senha'];
        $usuario['codTipoUsuario'] = 4;
        
        $ret = $this->usuarioModel->inserir($usuario);
        
        if($ret == true){
            echo 'sucesso';
        } else {
            echo 'falha';
        }
        
    }
    
    }

