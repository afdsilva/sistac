<?php

class UsuarioModel extends CI_Model {
    
        var $table = 'usuario';
    
    public function __construct() {
        parent::__construct();
    }

    public function Inserir($usuario) {
        
        $data = array (
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
    public function getUsuarios() {
        //$this->db->select('nome, email, descricao');
        //$this->db->from('usuario');
        //$this->db->join('tipoUsuario as tu', 'usuario.codTipoUsuario = tu.id');
        //$this->db->orderby('tu.id');
        //return $this->db->get()->result();
        return $this->db->query(
                "SELECT Nome, Email, Descricao "
                . "FROM usuario "
                . "JOIN tipoUsuario as tu ON usuario.codTipoUsuario = tu.id "
                . "ORDER BY tu.id"
            );
    }
    
    public function deleteAtividades($cpfUsuario) {
        $this->db->delete($this->table, array('cpfUsuario' => $cpfUsuario));
    }
}
    