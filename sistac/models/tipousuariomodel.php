<?php

class TipoUsuarioModel extends CI_Model {
	var $table = 'tipoUsuario';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getTipoUsuarios() {
            return $this->db->get($this->table)->result();
	}  
}