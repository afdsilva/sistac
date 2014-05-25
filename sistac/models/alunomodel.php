<?php

class AlunoModel extends CI_Model {
	
	var $table = 'usuario';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getAluno($cpf) {
		return $this->db->get_where($this->table, array('cpf' => $cpf))->row();
    }
}