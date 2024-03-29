<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Relatorio extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('coordenadorModel');
    $this->load->model('statusModel');
    $this->load->model('pedidoModel');
    $this->load->model('tipoAtividadeModel');
    $this->load->model('atividadeModel');
    $this->load->model('categoriaModel');

    $this->load->model('cursoModel');
  }

  function index() {
    redirect('home', 'refresh');
  }

  function gerente() {

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

    function coordenador() {
      $alunos = array();

      $info = array(
        "curso" => $_POST['curso'],
        "ano" => $_POST['ano'],
        "semestre" => $_POST['semestre'],
        "status" => "3"
      );

      foreach($this->pedidoModel->getPedidos($info, $_GET)["Records"] as $pedido){
        $aluno = array();

        $aluno['id'] = $pedido->id;
        $aluno['nome'] = $pedido->nome;
        $aluno['anoSemestre'] = $pedido->anoSemestre;
        $aluno['curso'] = $pedido->curso;
        $aluno['categoria'] = array(
          'pesquisa' => $this->calculaHoras(1, $pedido->id),
          'ensino' => $this->calculaHoras(2, $pedido->id),
          'extensao' => $this->calculaHoras(3, $pedido->id)
        );

        array_push($alunos, $aluno);

        $aluno = NULL;
      }

      $data['ano'] = $info['ano'];
      $data['semestre'] = $info['semestre'];
      $data['curso'] = $this->cursoModel->getCurso($info['curso'])->nome;

      $data['alunos'] = $alunos;

      $this->load->library('pdf');
      // $this->load->view('pdf/coordenador', $data);
      $this->pdf->load_view('pdf/coordenador', $data);
      $this->pdf->render();
      $this->pdf->stream('relatorio-coordenador-' . date('d.m.Y') . '.pdf');
    }

  }

  ?>