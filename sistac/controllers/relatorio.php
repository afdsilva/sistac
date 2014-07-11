<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller {
	public function __construct() {
    parent::__construct();
  }

  function index(){
  	redirect('home', 'refresh');
  }

  function gerente(){
  	
  }

  function coordenador(){
  	$data['curso'] = 'Ciência da Computação';
  	$data['semestre'] = '2';
  	$data['ano'] = '2014';

  	$temp = array(
  		'id' => '10206132',
		 	'nome' => 'André Guimarães Peil',
		 	'ano' => '2014',
		 	'semestre' => '1',
		 	'curso' => 'Ciência da Computação',
		 	'categoria' => array('100', '100', '100')
		);

		$data['alunos'] = array();

  	for($i = 0; $i < 30; $i++) array_push($data['alunos'], $temp);

  	$this->load->library('pdf');

		$this->pdf->load_view('pdf/coordenador', $data);

		$this->pdf->render();
		$this->pdf->stream('relatorio-coordenador-' . date('d.m.Y') . '.pdf');
  }
}

?>