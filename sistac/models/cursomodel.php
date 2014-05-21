<?php

class CursoModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }
 
    public function getCurso($id) {

        return $this->db->get('curso', $id)->row();
    }
    
    
       
}