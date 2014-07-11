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
    
    function gerarRelatorio() {
        $alunos = array();
        $aluno = array();
        $aluno = (object) $aluno;
        $info = array();
        $info = (object) $info;
        $size = $_POST['size'];
        $info->curso = $_POST['curso'];
        $info->ano = $_POST['ano'];
        $info->semestre = $_POST['semestre'];
        
        
        for ($i = 0; $i < $size; $i++) {

            $categorias = $this->categoriaModel->getCategorias();
            
            $aluno->id = $_POST['pedidos'][$i]['id'];
            $aluno->nome = $_POST['pedidos'][$i]['nome'];
            $aluno->anoSemestre = $_POST['pedidos'][$i]['anoSemestre'];
            $aluno->curso = $_POST['pedidos'][$i]['curso'];
            
            log_message('error',$aluno->id);
            
            foreach ($categorias as $ca) {

                if ($ca->id == 1) {
                    $aluno->pesquisa = $this->calculaHoras($ca->id, $aluno->id);
                } elseif ($ca->id == 2) {
                    $aluno->ensino = $this->calculaHoras($ca->id, $aluno->id);
                } elseif ($ca->id == 3) {
                    $aluno->extensao = $this->calculaHoras($ca->id, $aluno->id);
                }
            }
            $alunos[$i] = $aluno;
        }
        $this->coordenador($alunos, $info);
        
    }
             

    function coordenador($alunos, $info) {

        foreach($alunos as $a){
            $temp = array(
                'id' => $a->id,
                'nome' => $a->nome,
                'anoSemestre' => $a->anoSemestre,
                'curso' => $a->curso,
                'categoria' => array($a->pesquisa, $a->ensino, $a->extensao)
            );
            
        }
        $data['ano'] = $info->ano;
        $data['semestre'] = $info->semestre;
        $data['curso'] = $this->cursoModel->getCurso($info->curso)->nome;

        $data['alunos'] = array();
        array_push($data['alunos'], $temp);

        $this->load->library('pdf');

        $this->pdf->load_view('pdf/coordenador', $data);

        $this->pdf->render();
        $this->pdf->stream('relatorio-coordenador-' . date('d.m.Y') . '.pdf');
    }

}

?>