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
    if($this->session->userdata('user') && $this->session->userdata('user')->codTipoUsuario == 2){

      $data['logged'] = true;
      $data['pedidos'] = $this->pedidoModel->getPedidos($_POST, $_GET);
      $data['cursos'] = $this->cursoModel->getCursos();
      $data['status'] = $this->statusModel->getStatus();

      $this->navigation['navigation']['gerente'] = 'Gerente';

      $this->load->view('include/header', $data);
      $this->load->view('include/navigation', $this->navigation);
      $this->load->view('gerente/gerenteFiltroView', $data);
      $this->load->view('include/footer');
    } else {
      redirect('login', 'refresh');
    }
  }

  function listaPedidos() {
    print json_encode($this->pedidoModel->getPedidos($_POST, $_GET));
  }

  function listaAtividades($pedidoId) {
    print json_encode($this->atividadeModel->getAtividadesAluno($pedidoId, $_GET));
  }

  function filtrar() {
    $data['pedidos'] = $this->pedidoModel->getPedidos($_POST);
  }

    /**
     * Calcula as horas da atividades referente as categorias
     * 
     * @param type $categoriaId
     * @param type $pedidoId
     * @return type
     */
    function calculaHoras($categoriaId, $pedidoId) {

        // verifica o tamanho dos tipos de atividade
      $size = $this->tipoAtividadeModel->getCountTipoAtividades();
        // zera o vetor de controle
        // :: O vetor de controle em cada posição contém o somatório de horas
        //    das atividades que o aluno possui, sendo dividido pelas categorias
        //    pesquisa ensino e extensão.
      for ($i = 1; $i <= $size; $i++) {
        $controle[$i] = 0;
      }

      $atividades = $this->atividadeModel->refreshAluno($pedidoId)['Records'];

        // percorre todas as atividades
      foreach ($atividades as $a) {
            // verifica se a atividade corrente é da categoria analisada.
            // se sim: contabiliza na posição do tipo atividade
        if ($a->categoriaId == $categoriaId) {
          $controle[$a->tipoAtividadeId] += $a->aproveitamento;
        }
      }

      $tipoAtividades = $this->tipoAtividadeModel->getTipoAtividades();

      $retorno = 0;
      foreach ($tipoAtividades as $ta) {

            // verifica se o somatório da posição é maior que máximo de horas
            // que o aluno tem.
            // se sim: muda para o maxHoras
            // se não: deixa como ta
        if ($controle[$ta->id] > $ta->maxHoras) {
          $controle[$ta->id] = $ta->maxHoras;
        }

        $retorno += $controle[$ta->id];
      }
      return $retorno;
    }

    function editar($pedidoId = false) {
      if($pedidoId && $this->session->userdata('user')->codTipoUsuario == 2){
        $data['logged'] = true;
        $data['categorias'] = $this->categoriaModel->getCategorias();
        $data['tipoAtividades'] = $this->tipoAtividadeModel->getTipoAtividades();
        $data['status'] = $this->statusModel->getStatus();
        $data['aluno'] = $this->pedidoModel->getPedidoById($pedidoId);
        $data['pedidoId'] = $pedidoId;

        $atividades = $this->atividadeModel->refreshAluno($pedidoId)['Records'];

        $pesquisa = $ensino = $extensao = 0;
        $flag = true;

        foreach ($data['categorias'] as $ca) {

          if ($ca->id == 1) {
            $pesquisa = $this->calculaHoras($ca->id, $pedidoId);
          } elseif ($ca->id == 2) {
            $ensino = $this->calculaHoras($ca->id, $pedidoId);
          } elseif ($ca->id == 3) {
            $extensao = $this->calculaHoras($ca->id, $pedidoId);
          }
        }
            // percorre todas as atividades do aluno
        foreach ($atividades as $atividade) {
                // verifica se todas as atividade estao validadas      
          if ($atividade->validaAtividade != 'Sim') {
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
        if (($pesquisa >= 100) && ($ensino >= 100) && ($extensao >= 100)) {
          if ($flag == true) {
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

        $this->navigation['navigation']['gerente'] = 'Gerente';
        $this->navigation['navigation']['gerente/editar'] = array('name' => 'Editar', 'active' => true);
        $this->navigation['navigation']['gerente/editar/' . $pedidoId] = $pedidoId;

        $this->load->view('include/header', $data);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('gerente/gerenteView', $data);
        $this->load->view('include/footer');
      } else {
        redirect('login', 'refresh');
      }
    }

    function salvar() {

      $atividade['id'] = $_POST['id'];
      $atividade['descricao'] = $_POST['descricao'];
      $atividade['categoria'] = $_POST['categoria'];
      $atividade['tipoAtividade'] = $_POST['tipoAtividade'];
      $atividade['unidadeAtividade'] = $_POST['unidade'];
      $atividade['validaAtividade'] = $_POST['validaAtividade'];
      $atividade['aproveitamento'] = $_POST['aproveitamento'];

      $ret = $this->atividadeModel->alterarAtividade($atividade);


      if ($ret == true) {
        echo 'sucesso';
      } else {
        echo 'falha';
      }
    }

    function alterarStatus() {

      $status['codStatus'] = $_POST['status'];
      $status['codPedido'] = $_POST['pedidoId'];

      $ret = $this->pedidoModel->alterarStatus($status);

      if ($ret == true) {
        echo 'sucesso';
      } else {
        echo 'falha';
      }
    }

  }
