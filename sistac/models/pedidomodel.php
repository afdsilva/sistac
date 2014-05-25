<?php

class PedidoModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedidos($codUsuario) {
        
    	$this->db->select('*');
    	$this->db->from('pedido');
    	$this->db->join('usuario ', 'usuario.cpf = pedido.codUsuario');
    	$this->db->where('codUsuario', $codUsuario);
        return $this->db->get()->result();

    }
    public function getPedido($idPedido, $codUsuario) {
        
    	$this->db->select('*')->
    		from('pedido')->
    		join('usuario ', 'usuario.cpf = pedido.codUsuario')->
    		where('codUsuario', $codUsuario)->
    		where('id', $idPedido);
        return $this->db->get()->row();

    }
    
    public function inserirPedido($pedido) {   
    }

    public function editarPedido($id) {
        
    }

    public function removerPedido($id) {
        
    }

    
}