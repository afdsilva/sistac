<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coordenador extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('coordenadorModel');
        $this->load->model('statusModel');
        $this->load->model('pedidoModel');
        $this->load->model('atividadeModel');
        $this->load->model('categoriaModel');
    }

    function index() {
        if ($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 3) {
            
            $data['coordenadorCurso'] = $this->session->userdata('user')->codCurso;
            $data['logged'] = true;
            $data['status'] = $this->statusModel->getStatus();
            $data['resumo'] = $this->calculaAlunos();

            $this->navigation['navigation']['coordenador'] = 'Coordenador';

            $this->load->view('include/header', $data);
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
    
    function calculaAlunos(){
        $pedidos = $this->pedidoModel->getPedidos($_POST, $_GET)['Records'];
        $resumo = array();
            $resumo = (object) $resumo;
            $resumo->espera = 0;
            $resumo->analise = 0;
            $resumo->pronto = 0;
            $resumo->correcao = 0;
            
            foreach($pedidos as $p){
                
                switch($p->codStatus){
                    case 1:    
                        $resumo->espera++;
                        break;
                    case 2:
                        $resumo->analise++;
                        break;
                    case 3:
                        $resumo->pronto++;
                        break;
                    case 4:
                        $resumo->correcao;
                        break;
                }  
            }
        return $resumo;
    }
    

}
