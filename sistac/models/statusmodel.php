<?php

class StatusModel extends CI_Model {
	var $table = 'status';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getStatus() {
		return $this->db->get($this->table)->result();
	}
	
	public function getSt($idStatus) {
		return $this->db->get_where($this->table, array('id' => $idStatus))->row();
	}
	
        
}