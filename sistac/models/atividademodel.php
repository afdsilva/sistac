<?php

class AtividadeModel extends CI_Model {

    var $table = 'atividade';

    public function __construct() {
        parent::__construct();
    }

    public function getAtividades($idPedido) {
        $this->db->select("$this->table.id, 
    			$this->table.descricao, 
    			$this->table.unidadeAtividade, 
    			$this->table.codTipoAtividade,
                        $this->table.arquivoURL,
                        $this->table.codPedido,    
    			tipoAtividade.nome as tipoAtividade, 
    			$this->table.codCategoria,
    			categoria.nome as categoria")->
                from($this->table)->
                join('tipoAtividade', "tipoAtividade.id = $this->table.codTipoAtividade")->
                join('categoria', "categoria.id = $this->table.codCategoria")->
                where($this->table . '.codPedido', $idPedido);
        return $this->db->get()->result();
    }

    public function getAtividade($idAtividade, $idPedido) {
        $this->db->select("$this->table.id, "
                . "$this->table.descricao, "
                . "$this->table.unidadeAtividade, "
                . "$this->table.codTipoAtividade, tipoAtividade.nome, "
                . "$this->table.codCategoria, categoria.nome,"
                . "$this->table.arquivoURL")->
                from($this->table)->
                join('tipoAtividade', "tipoAtividade.id = $this->table.codTipoAtividade")->
                join('categoria', "categoria.id = $this->table.codCategoria")->
                where($this->table . '.id', $idAtividade)->
                where($this->table . '.codPedido', $idPedido);
        return $this->db->get()->row();
    }

    function insertAtividade($data) {
        $this->db->insert($this->table, $data);
    }

    function deleteAtividade($idPedido, $idAtividade) {
        $this->db->delete($this->table, array('codPedido' => $idPedido, 'id' => $idAtividade));
    }

    //remove todas atividades do pedido
    function deleteAtividades($idPedido) {
        $this->db->delete($this->table, array('codPedido' => $idPedido));
    }

    function setArquivoURL($idPedido, $idAtividade, $arquivoURL) {

        $data = array('arquivoURL' => $arquivoURL);
        $this->db->where('id', $idAtividade);
        $this->db->where('codPedido', $idPedido);
        $this->db->update('atividade', $data);
    }

    function removerCertificado($idPedido, $idAtividade) {

        $data = array('arquivoURL' => NULL);
        $this->db->where('id', $idAtividade);
        $this->db->where('codPedido', $idPedido);
        $this->db->update('atividade', $data);
    }

}
