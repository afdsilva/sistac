<?php

class PedidoModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedido($idPessoa) {
        
        $q = $this->db->query('SELECT * FROM pedido AS p JOIN usuario AS u ON p.codUsuario = u.cpf WHERE u.cpf ='.$idPessoa);
        $data = $q->result();

        return $data;

    }

    public function inserirPedido($pedido) {   
    }

    public function editarPedido($id) {
        
    }

    public function removerPedido($id) {
        
    }

    
}