<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrador extends CI_Controller {

    var $navigation = array('navigation' => array('administrador' => 'Administrador'));
    var $data = array('erro' => '', 'usuario' => '');

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->model('alunoModel');
        $this->load->model('cursoModel');
        $this->load->model('TipoUsuarioModel');
    }

    function index() {
        if ($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 1) {
            $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST, $_GET);
            $data['tipoUsuarios'] = $this->TipoUsuarioModel->getTipoUsuarios($_POST, $_GET);
            $dataHeader['tipoUsuario'] = $data['tipoUsuario'] = $this->session->userdata('user')->codTipoUsuario; 
            $data['logged'] = $dataHeader['logged'] = true;
            $this->navigation['navigation']['administrador'] = 'Administrador';

            $this->load->view('include/header', $dataHeader);
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('administrador/administradorFiltroView', $data);
            $this->load->view('include/footer');
        } else {
            $this->redirect('login', 'refresh');
        }
    }

    function listaUsuarios() {
        print json_encode($this->usuarioModel->getUsuarios($_POST, $_GET));
    }

    function filtrar() {
        $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST, $_GET);
    }

    function editar($usuarioId = false) {
        if ($usuarioId && $this->session->userdata('user')->codTipoUsuario == 1) {
            $dataHeader['tipoUsuario'] = $data['tipoUsuario'] = $this->session->userdata('user')->codTipoUsuario; 
            $data['logged'] = $dataHeader['logged'] = true;
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
            $dataHeader['tipoUsuario'] = $data['tipoUsuario'] = $this->session->userdata('user')->codTipoUsuario; 
            $data['logged'] = $dataHeader['logged'] = true;
            $data['cursos'] = $this->cursoModel->getCursos();
            $data['tipoUsuario'] = $this->TipoUsuarioModel->getTipoUsuarios();
            $this->load->view('include/header', $dataHeader);
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('administrador/administradorView', $data);
            $this->load->view('include/footer');
        } else {
            $this->redirect('home', 'refresh');
        }
    }

    function salvar() {
        
        $usuario['cpf'] = $_POST['cpf'];
        $usuario['nome'] = $_POST['nome'];
        $usuario['curso'] = $_POST['curso'];
        $usuario['email'] = $_POST['email'];
        $usuario['codTipoUsuario'] = $_POST['tipoUsuario'];
        

        if($_POST['tipo'] == 1){
            $usuario['senha'] = $_POST['senha'];
            $ret = $this->usuarioModel->inserir($usuario);
        } else {
            $ret = $this->usuarioModel->alterar($usuario);
        }

        if ($ret == true) {
            echo 'sucesso';
        } else {
            echo 'falha';
        }
    
    }
    
    function remover(){
        $cpf = $_POST['cpf'];
        
        if($_POST['tipoUsuario'] != 4){    
            $ret = $this->usuarioModel->remover($cpf);
        } else {
            $temp = $this->usuarioModel->removerPedido($cpf);
            
            if($temp == true){
                $ret = $this->usuarioModel->remover($cpf);
            } else {
                echo 'falhaAluno';
            }
            
        }
        
        if ($ret == true) {
            echo 'sucesso';
        } else {
            echo 'falha';
        }
        
        
    }

}
