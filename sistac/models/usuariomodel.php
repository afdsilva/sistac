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
}
    