<?php
class CategoriaModel extends CI_Model {
	var $table = "categoria";
	var $id = '';
	var $nome = '';
	
    public function __construct() {
        parent::__construct();
    }

    public function getCategorias() {
        return $this->db->get($this->table)->result();
    }

    public function getCategoria($idCategoria) {
    	return $this->db->get_where($this->table, array('id' => $idCategoria))->row();
    }
	
    public function getCategoriaByName($nomeCategoria) {
    	return $this->db->get_where($this->table, array('nome' => $nomeCategoria))->row();
    }

}
