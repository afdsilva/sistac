<?php

class AtividadeModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }
 
    public function getAtividade($id, $pedido) {

        return $this->db->get('atividade', $id, $pedido)->row();
    }
    
}