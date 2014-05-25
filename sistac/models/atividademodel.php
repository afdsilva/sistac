<?php

class AtividadeModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }
 
    public function getAtividade($id, $pedido) {

        return $this->db->get('atividade', $id, $pedido)->row();
    }
    
    public function getAtividades($idPedido){

        $this->db->select('*')->
    		from('atividade as a')->
    		where('a.codPedido', $idPedido);
    	$data = $this->db->get()->result_array();
        return $data;
        
    }
    
}