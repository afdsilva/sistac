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
    public function getPedido($codUsuario) {
        
    	$this->db->select('*')->
    		from('pedido')->
    		join('usuario ', 'usuario.cpf = pedido.codUsuario')->
    		where('codUsuario', $codUsuario);
        return $this->db->get()->row();
    }
    
    public function getPedidoById($idPedido){
       $this->db->select('*')->
    		from('pedido as p')->
    		join('usuario ', 'usuario.cpf = p.codUsuario')->
    		where('p.id', $idPedido);
        return $this->db->get()->row(); 
        
    }
}