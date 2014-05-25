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
    	$this->db->select('p.id, s.nome as status, u.nome, u.email, a.*')->
    		from('pedido as p')->
    		join('usuario as u ', 'u.cpf = p.codUsuario')->
                join('status as s', 'p.codStatus = s.id')->
                join('atividade as a', 'p.id = a.codPedido')->
    		where('codUsuario', $codUsuario)->
    		where('p.id', $idPedido);
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