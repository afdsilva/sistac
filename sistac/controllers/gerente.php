<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gerente extends CI_Controller {
    
    var $navigation = array('navigation' => array('gerente' => 'Gerente'));
    
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
                $data['logged'] = true;
                $data['pedidos'] = $this->pedidoModel->getPedidos($_POST, $_GET);
                $data['cursos'] = $this->cursoModel->getCursos();
                $data['status'] = $this->statusModel->getStatus();
                $this->load->view('include/header', $data);
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
    
    function listaAtividades($pedidoId){
        print json_encode($this->atividadeModel->getAtividadesAluno($pedidoId, $_GET));
    }
    
    function filtrar() {
        $data['pedidos'] = $this->pedidoModel->getPedidos($_POST);
    }

    function editar($pedidoId) {
        
        
        if ($this->session->userdata('user')->codTipoUsuario == 2) {
            $data['logged'] = true;
            $data['categorias'] = $this->categoriaModel->getCategorias();
            $data['tipoAtividades'] = $this->tipoAtividadeModel->getTipoAtividades();
            $data['status'] = $this->statusModel->getStatus();
            $data['aluno'] = $this->pedidoModel->getPedidoById($pedidoId);
            $data['pedidoId'] = $pedidoId;
            
            $atividades = $this->atividadeModel->refreshAluno($pedidoId);

            $pesquisa = $ensino = $extensao = 0;
            $flag = true;
            
            // percorre todas as atividades do aluno
            foreach ($atividades as $atividade){                
                // verifica qual categoria a atividade corrente pertence e soma no
                // contador de cara categoria
                if($atividade->categoriaId == 1){
                    $pesquisa += $atividade->horas;
                } elseif ($atividade->categoriaId == 2){
                    $ensino += $atividade->horas;
                } elseif($atividade->categoriaId == 3){
                    $extensao += $atividade->horas;
                }      
                if($atividade->validaAtividade != 'Sim'){
                    $flag = false;
                }
                
            }
            // cria o objeto para atualizar o status geral do pedido
            $obj = array();
            $obj = (object) $obj;
            $obj->pesquisa = $pesquisa;
            $obj->ensino = $ensino;
            $obj->extensao = $extensao;
            
            // verifica depois do loop, se o numero de atividades é suficiente 
            if(($pesquisa >= 100) && ($ensino >= 100) && ($extensao >= 100)){
                if($flag == true){
                    // alert verde
                    $obj->id = 1;
                    $obj->aviso = " Pedido Verificado.";
                    $data['resumo'] = $obj;
                } else {
                    // alert amarelo
                    $obj->id = 2;
                    $obj->aviso = " Pedido não Verificado.";
                    $data['resumo'] = $obj;
                }
            } else {
                // alert vermelho
                    $obj->id = 3;
                    $obj->aviso = " Horas insuficientes.";
                    $data['resumo'] = $obj;
            }
            
            $this->load->view('include/header', $data);
            $this->load->view('gerente/gerenteView', $data);
            $this->load->view('include/footer');
        } else {
            $this->redirect('home', 'refresh');
        }
    }
    
    function salvar(){
        
        $atividade['id'] = $_POST['id'];
        $atividade['descricao'] = $_POST['descricao'];
        $atividade['categoria'] = $_POST['categoria'];
        $atividade['tipoAtividade'] = $_POST['tipoAtividade'];
        $atividade['unidadeAtividade'] = $_POST['unidade'];
        $atividade['validaAtividade'] = $_POST['validaAtividade'];
        
        $ret = $this->atividadeModel->alterarAtividade($atividade);
        
        
        if($ret == true){
            echo 'sucesso';
        } else {
            echo 'falha';
        }
        
    }
    
    function alterarStatus(){
        
        $status['codStatus'] = $_POST['status'];
        $status['codPedido'] = $_POST['pedidoId'];
        
        $ret = $this->pedidoModel->alterarStatus($status);
        
        if($ret == true){
            echo 'sucesso';
        } else {
            echo 'falha';
        }
    }
    


}
