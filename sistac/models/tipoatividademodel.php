<?php

class TipoAtividadeModel extends CI_Model {
	var $table = 'tipoAtividade';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getTipoAtividades() {
		return $this->db->get($this->table)->result();
	}
	
        public function getCountTipoAtividades() {
		return $this->db->get($this->table)->num_rows();
	}
	
        
	public function getTipoAtividade($idTipoAtividade) {
		return $this->db->get_where($this->table, array('id' => $idTipoAtividade))->row();
	}
	
	public function getTipoAtividadeByName($nome) {
		return $this->db->get_where($this->table, array('nome' => $nome))->row();
	}
        
}