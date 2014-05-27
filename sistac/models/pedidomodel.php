<?php

class PedidoModel extends CI_Model {
	var $table = 'pedido';
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
    public function insertNovoPedido($idUsuario) {
    	
    	$semestre = (date('M') > 6 ? 2 : 1);
    	$ano = date('Y');
    	$data = array(
    			'ano' => $ano, 
    			'semestre' => $semestre, 
    			'codUsuario' => $idUsuario, 
    			'codStatus' => '1'
    	);
    	$this->db->insert($this->table, $data);
    	return $this->db->insert_id();
    }
}