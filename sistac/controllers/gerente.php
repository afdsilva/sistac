<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gerente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('gerenteModel');
        $this->load->model('cursoModel');
        $this->load->model('statusModel');
        $this->load->model('pedidoModel');
        $this->load->model('atividadeModel');
        $this->load->model('categoriaModel');
        $this->load->model('tipoAtividadeModel');
        $this->load->model('unidadeModel');
    }

    function index() {
        if ($this->session->userdata('user') == true) {
            if ($this->session->userdata('user')->codTipoUsuario == 2) {
                $data['pedidos'] = $this->pedidoModel->getPedidos($_POST, $_GET);
                $data['cursos'] = $this->cursoModel->getCursos();
                $data['status'] = $this->statusModel->getStatus();
                $this->load->view('include/headerAreaRestrita');
                $this->load->view('gerente/gerenteFiltroView', $data);
                $this->load->view('include/footer');
            } else {
                $this->redirect('login', 'refresh');
            }
        } else {
            $this->redirect('login', 'refresh');
        }
    }

    function listaPedidos() {
        print json_encode($this->pedidoModel->getPedidos($_POST, $_GET));
    }

    function filtrar() {
        $data['pedidos'] = $this->pedidoModel->getPedidos($_POST);
    }

    function editar($pedidoId) {
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
    }

}
