<?php

/*
 * Unit_model
 * An easier way to construct your unit testing
 * and pass it to a really nice looking page.
 *
 * @author sjlu
 */

class CategoriaModel extends CI_Model {
	//var $table = "categoria";
	var $id = '';
	var $nome = '';
	
    public function __construct() {
        parent::__construct();
    }

    public function getCategorias() {

        return $this->db->get('categoria')->result();
    }

    public function getCategoria($id) {

        return $this->db->get('categoria', $id)->row();
    }
	
    public function getCategoriaByName($nome) {
    	return $this->db->get_where('categoria', array('nome' => $nome))->row();
    }
    
    public function inserirCategoria($categoria) {   
    }

    public function editarCategoria($id) {
        
    }

    public function removerCategoria($id) {
        
    }

}
