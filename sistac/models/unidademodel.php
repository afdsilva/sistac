<?php

class UnidadeModel extends CI_Model {
	var $table = 'unidade';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getUnidades() {
		return $this->db->aget($this->table)->result();
	}
	
	public function getUnidade($idUnidade) {
		return $this->db->get_where($this->table, array('id' => $idUnidade))->row();
	}
	
        
}