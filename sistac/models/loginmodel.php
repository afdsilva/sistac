<?php

class LoginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate($user, $pass) {
        $this->db->select('cpf, nome, codTipoUsuario, codCurso');
        $this->db->from('usuario');
        $this->db->where('email', $user);
        $this->db->where('senha', md5($pass));
        $this->db->limit(1);

        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $query = $query->result();
            return $query[0];
        } else {
            return false;
        }
    }

}

?>