<?php

class PedidoModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedidos($codUsuario) {
        
        //$q = $this->db->query('SELECT * FROM pedido AS p JOIN usuario AS u ON p.codUsuario = u.cpf WHERE u.cpf ='.$idPessoa);
        //$data = $q->result();
    	$this->db->select('*');
    	$this->db->from('pedido');
    	$this->db->join('usuario ', 'usuario.cpf = pedido.codUsuario');
    	$this->db->where('codUsuario', $codUsuario);
    	$data = $this->db->get()->row();

        return $data;

    }
    public function getPedido($idPedido, $codUsuario) {
        
        //$q = $this->db->query('SELECT * FROM pedido AS p JOIN usuario AS u ON p.codUsuario = u.cpf WHERE u.cpf ='.$idPessoa);
        //$data = $q->result();
    	$this->db->select('*')->
    		from('pedido')->
    		join('usuario ', 'usuario.cpf = pedido.codUsuario')->
    		where('codUsuario', $codUsuario)->
    		where('id', $idPedido);
    	$data = $this->db->get()->row();

        return $data;

    }

    public function inserirPedido($pedido) {   
    }

    public function editarPedido($id) {
        
    }

    public function removerPedido($id) {
        
    }

    
}