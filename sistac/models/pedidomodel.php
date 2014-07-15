<?php

class PedidoModel extends CI_Model {

    var $table = 'pedido';

    public function __construct() {
        parent::__construct();
    }

    /*
      public function getPedidos($codUsuario) {

      $this->db->select('*');
      $this->db->from('pedido');
      $this->db->join('usuario ', 'usuario.cpf = pedido.codUsuario');
      $this->db->where('codUsuario', $codUsuario);
      return $this->db->get()->result();
      }
     */

    public function getPedido($codUsuario) {

        $this->db->select('*')->
                from('pedido')->
                join('usuario ', 'usuario.cpf = pedido.codUsuario')->
                where('codUsuario', $codUsuario);
        return $this->db->get()->row();
    }

    public function getPedidoById($idPedido) {
        $this->db->select('*')->
                from('pedido as p')->
                join('usuario ', 'usuario.cpf = p.codUsuario')->
                where('p.id', $idPedido);
        return $this->db->get()->row();
    }
    
    function getTotalPedidos(){
       $retorno =  $this->db->get('pedido');
        return $retorno->num_rows();
    }
    
    
    function getPedidos($parametros, $get) {
        
        $data['TotalRecordCount'] = $this->getTotalPedidos();
        $this->db->trans_start();
        $this->db->select("p.id, u.nome as nome, c.nome as curso, concat(p.ano,'/',p.semestre) as anoSemestre, s.nome as status, p.codStatus", false);
        $this->db->from('pedido as p');
        $this->db->join('usuario as u', 'u.cpf = p.codUsuario');
        $this->db->join('curso as c', 'c.id = u.codCurso');
        $this->db->join('status as s', 's.id = p.codStatus');

        if (!empty($parametros['ano'])) {
            $this->db->where('p.ano', $parametros['ano']);
        }
        if (!empty($parametros['curso'])) {
            $this->db->where('u.codCurso', $parametros['curso']);
        }
        if (!empty($parametros['status'])) {
            $this->db->where('s.id', $parametros['status']);
        }

        if (!empty($parametros['semestre'])) {
            $this->db->where('p.semestre', $parametros['semestre']);
        }
        if (!empty($parametros['nomeAluno'])) {
            $this->db->like('upper(u.nome)', strtoupper($parametros['nomeAluno']));
        }

        
          if (!empty($get['jtSorting'])) {
                $pieces = explode(" ", @$get['jtSorting']);
                $this->db->order_by($pieces[0],$pieces[1]);
            }

            if (@$get['jtStartIndex'] !== '' && @$get['jtPageSize'] !== '') {
                $this->db->limit(@$get['jtPageSize'],@$get['jtStartIndex']);
            }
         
        $data['Records'] = $this->db->get()->result();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $data['Result'] = "ERROR";
        } else {
            $data['Result'] = "OK";
        }

        return $data;
    }

    public function insertNovoPedido($idUsuario, $matricula) {

        $semestre = (date('M') > 6 ? 2 : 1);
        $ano = date('Y');
        $data = array(
            'id' => $matricula,
            'ano' => $ano,
            'semestre' => $semestre,
            'codUsuario' => $idUsuario,
            'codStatus' => '1'
        );
        $this->db->insert($this->table, $data);
        return $matricula;
    }
    
    public function alterarStatus($status){
        
        $this->db->trans_start();
            $update = array(
                'codStatus' => $status['codStatus']);   
            $this->db->where('id', $status['codPedido']);
            $this->db->update('pedido', $update); 
        $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

}
