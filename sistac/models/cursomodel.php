<?php
class CursoModel extends CI_Model {
	var $table = "curso";

	public function __construct() {
		parent::__construct();
	}

	public function getCursos() {
		return $this->db->get($this->table)->result();
	}

	public function getCurso($codCurso) {
		return $this->db->get_where($this->table, array('id' => $codCurso))->row();
	}

	public function getCursoByName($nomeCurso) {
		return $this->db->get_where($this->table, array('nome' => $nomeCurso))->row();
	}

}
