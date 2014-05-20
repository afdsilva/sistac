<?php
/*
 * Unit_model
 * An easier way to construct your unit testing
 * and pass it to a really nice looking page.
 *
 * @author sjlu
 */
class GerenteModel extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   public function getGerente(){
       
       //return $this->db->get('usuario')->result();
       
   }
   
   public function inserirGerente($gerente) {
       
   }
   
   public function editarGerente($id){
       
       
   }
   public function removerGerente($id){
       
       
   }

}