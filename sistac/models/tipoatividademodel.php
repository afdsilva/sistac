<?php

class TipoAtividadeModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }
 
    public function getTipoAtividade($id) {

        return $this->db->get('tipoAtividade', $id)->row();
    }
    
    public function getTipoAtividadeByName($nome) {
    
    	return $this->db->get_where('tipoAtividade', array('nome' => $nome))->row();
    }
    
       
}