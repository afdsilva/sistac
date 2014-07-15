<?php

class UsuarioModel extends CI_Model {

    var $table = 'usuario';

    public function __construct() {
        parent::__construct();
        $this->load->model('alunoModel');
    }

    public function Inserir($usuario) {

        $data = array(
            'cpf' => $usuario['cpf'],
            'nome' => $usuario['nome'],
            'codCurso' => $usuario['curso'],
            'email' => $usuario['email'],
            'senha' => md5($usuario['senha']),
            'codTipoUsuario' => $usuario['codTipoUsuario']);

        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function Alterar($usuario){
        $data = array(
            'nome' => $usuario['nome'],
            'codCurso' => $usuario['curso'],
            'email' => $usuario['email'],
            'codTipoUsuario' => $usuario['codTipoUsuario']);

        $this->db->trans_start();
            $this->db->where('cpf', $usuario['cpf']);
            $this->db->update('usuario', $update);    
        $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
    
    public function remover($cpf){
        $this->db->trans_start();
            $this->db->delete('usuario', array('cpf' => $cpf));
        $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
    
    function getTotalUsuarios(){
        
        $retorno =  $this->db->get('usuario');
        return $retorno->num_rows();
    }
    
    public function getUsuarios($parametros, $get) {
        
        $data['TotalRecordCount'] = $this->getTotalUsuarios();
        $this->db->trans_complete();
        $this->db->select('u.cpf, u.nome, u.email, tu.descricao', false);
        $this->db->from('usuario as u');
        $this->db->join('tipoUsuario as tu', 'u.codTipoUsuario = tu.id');

        if (!empty($parametros['email'])) {
            $this->db->like('upper(u.email)', strtoupper($parametros['email']));
        }
        if (!empty($parametros['nomeUsuario'])) {
            $this->db->like('upper(u.nome)', strtoupper($parametros['nomeUsuario']));
        }
        if (!empty($parametros['tipoUsuario'])) {
            $this->db->where('u.codTipoUsuario', $parametros['tipoUsuario']);
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

    public function deleteAtividades($cpfUsuario) {
        $this->db->delete($this->table, array('cpfUsuario' => $cpfUsuario));
    }
    
    public function removerPedido($idUsuario) {
		//remove todos registros que contenham o codigo do usuario
		if (!$this->alunoModel->getPedido($idUsuario)) 
			return true;
		$idPedido = $this->getPedido($idUsuario)->id;
		if ($idPedido) {
			$this->db->delete('atividade', array('codPedido' => $idPedido));
			$this->db->delete($this->tablePedido, array('codUsuario' => $idUsuario));
			return true;
		}
		return false;
	}

    public function getUsuarioByCPF($cpf){
        $this->db->select('*');
        $this->db->from('usuario as u');
        $this->db->where('u.cpf', $cpf);
        
        return $this->db->get()->row();
    }    
}
