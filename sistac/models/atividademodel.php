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
				$this->table.idCertificado,
        		certificado.descricao as certificado,
				$this->table.codPedido,
        		tipoAtividade.nome as tipoAtividade, 
    			$this->table.codCategoria,
    			categoria.nome as categoria")->
                from($this->table)->
                join('tipoAtividade', "tipoAtividade.id = $this->table.codTipoAtividade")->
                join('categoria', "categoria.id = $this->table.codCategoria")->
                join('certificado', "certificado.id = $this->table.idCertificado", 'left')->
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

        $insert = array(
            'id' => $data['id'],
            'codPedido' => $data['codPedido'],
            'descricao' => $data['descricao'],
            'unidadeAtividade' => $data['unidadeAtividade'],
            'codTipoAtividade' => $data['codTipoAtividade'],
            'codCategoria' => $data['codCategoria']);

        $this->db->insert($this->table, $insert);
    }
    
    function alterarAtividade($atividade){
        
        $this->db->trans_start();
            $update = array(
                'descricao' => $atividade['descricao'],
                'codTipoAtividade' => $atividade['tipoAtividade'],
                'codCategoria' => $atividade['categoria'],
                'unidadeAtividade' => $atividade['unidadeAtividade'],
                'validaAtividade' => $atividade['validaAtividade']);   
            $this->db->where('id', $atividade['id']);
            $this->db->update('atividade', $update); 
        $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
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

    function getLastIdAtividade($idPedido) {
        return $this->db->select_max('id')->where('codPedido', $idPedido)->get('atividade')->row() + 1;
    }

    function getAtividadesAluno($pedidoId, $get) {

        $this->db->select("a.id, a.codPedido as pedidoId, a.descricao, c.nome as categoria, "
                . "ta.nome as tipoAtividade, "
                . "a.unidadeAtividade as horas, ta.maxHoras as aproveitamento, "
                . " CASE WHEN a.validaAtividade = 'S' THEN 'Sim' ELSE 'Não' end as validaAtividade,"
                . " ta.id as tipoAtividadeId, "
                . "c.id as categoriaId", false);
        $this->db->from('atividade as a');
        $this->db->join('categoria as c', 'c.id = a.codCategoria');
        $this->db->join('tipoAtividade as ta', 'ta.id = a.codTipoAtividade');
        $this->db->where('a.codPedido', $pedidoId);

        if (!empty($get['jtSorting'])) {
            $pieces = explode(" ", @$get['jtSorting']);
            $this->db->order_by($pieces[0], $pieces[1]);
        }

        if (@$get['jtStartIndex'] != '' && @$get['jtPageSize'] != '') {
            $this->db->limit($get['jtStartIndex'] + ',' + $get['jtPageSize']);
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

}
