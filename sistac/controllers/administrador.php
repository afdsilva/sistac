<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarioModel');
    }

    function index() {
        if ($this->session->userdata('user') == true) {
            if ($this->session->userdata('user')->codTipoUsuario == 1) {
                $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST,$_GET);
                $this->load->view('include/headerAreaRestrita');
                $this->load->view('administrador/administradorFiltroView', $data);
                $this->load->view('include/footer');
            } 
            else {
                $this->redirect('login', 'refresh');
            }
        } 
        else {
            $this->redirect('login', 'refresh');
        }
    }

    function listaUsuarios() {
         print json_encode($this->usuarioModel->getUsuarios($_POST,$_GET));
    }

    function filtrar() {
        $data['usuarios'] = $this->usuarioModel->getUsuarios($_POST,$_GET);
    }
    
    /*function editar($pedidoId) {
        if ($this->session->userdata('user')->codTipoUsuario == 2) {
            $data['categorias'] = $this->categoriaModel->getCategorias();
            $data['tipoAtividades'] = $this->tipoAtividadeModel->getTipoAtividades();
            $data['atividades'] = $this->atividadeModel->getAtividades($pedidoId);
            //$data['unidade'] = $this->unidadeModel->getUnidade($data['tipoAtividades']->codUnidade);
            $this->load->view('include/header');
            $this->load->view('gerente/gerenteView', $data);
            $this->load->view('include/footer');
        } else {
            $this->redirect('home', 'refresh');
        }
    }*/
}    