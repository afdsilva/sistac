<?php

class AlunoModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }
 
    public function getAluno($id) {

        return $this->db->get('usuario', $id)->row();
    }
    
    
       
}