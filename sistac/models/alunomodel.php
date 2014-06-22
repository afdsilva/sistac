<?php

class AlunoModel extends CI_Model {
	
	var $table = 'usuario';
	var $tablePedido = 'pedido';
	var $tableCertificado = 'certificado';
	var $tableAtividade = 'atividade';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getAluno($cpf) {
		return $this->db->get_where($this->table, array('cpf' => $cpf))->row();
    }
    
	public function getPedido($codUsuario) {
		
		$this->db->select("pedido.id as id, usuario.nome as nome, curso.nome as curso, pedido.ano, pedido.semestre, status.nome as status", false)->
			from('pedido')->
			join('usuario', 'usuario.cpf = pedido.codUsuario')->
			join('curso', 'curso.id = usuario.codCurso')->
			join('status', 'status.id = pedido.codStatus')->
			where('codUsuario', $codUsuario);
		return $this->db->get()->row();
	}
	
	public function getPedidoById($idPedido) {
		$this->db->select('*')->
		from($this->tablePedido)->
		join('usuario ', 'usuario.cpf = pedido.codUsuario')->
		where('pedido.id', $idPedido);
		return $this->db->get()->row();
	}
	public function removePedidos($idUsuario) {
		//remove todos registros que contenham o codigo do usuario
		if (!$this->getPedido($idUsuario)) 
			return false;
		$idPedido = $this->getPedido($idUsuario)->id;
		if ($idPedido) {
			$this->db->delete('atividade', array('codPedido' => $idPedido));
			$this->db->delete($this->tablePedido, array('codUsuario' => $idUsuario));
			return true;
		}
		return false;
	}
	
	public function insertNovoPedido($idUsuario, $matricula) {
	
		$semestre = (date('M') > 6 ? 2 : 1);
		$ano = date('Y');
		$insert = array(
				'id' => $matricula,
				'ano' => $ano,
				'semestre' => $semestre,
				'codUsuario' => $idUsuario,
				'codStatus' => '1'
		);
		$this->db->insert($this->tablePedido, $insert);
		return $matricula;
	}
	public function getCertificados($idAluno) {
		$this->db->select("$this->tableCertificado.id, 
				$this->tableCertificado.descricao, 
				$this->tableCertificado.arquivo, 
				$this->tableCertificado.idAluno")->
			from($this->tableCertificado)->
			where("$this->tableCertificado.idAluno", $idAluno);
		return $this->db->get()->result();
	}
	public function getCertificado($idAluno, $idCertificado) {
		$this->db->select("$this->tableCertificado.id,
				$this->tableCertificado.descricao,
				$this->tableCertificado.arquivo,
				$this->tableCertificado.idAluno")->
				from($this->tableCertificado)->
				where("$this->tableCertificado.idAluno", $idAluno)->
				where("$this->tableCertificado.id", $idCertificado);
		return $this->db->get()->row();
	}
	public function insertNovoCertificado($idAluno,$data) {
		
		$result = $this->db->select_max('id')->
			where('idAluno', $idAluno)->
			get($this->tableCertificado)->row();
		$insert = array(
			'id' => $result->id + 1,
			'descricao' => $data['descricao'],
			'arquivo' => $data['arquivo'],
			'idAluno' => $idAluno
		);
		
		return $this->db->insert($this->tableCertificado, $insert);
	}
	public function removeCertificado($idAluno,$idCertificado) {
		//remove a ligacao com todas atividade, caso ouver alguma antes de remover o certificado do banco de dados
		$results = $this->db->select("*")->
			from($this->tableAtividade)->
			where('idCertificado',$idCertificado)->
			get()->result();
		foreach($results as $result) {
			$this->bindCertificado($result->codPedido,"0",$idCertificado);
		}
		$this->db->delete('certificado', array('id' => $idCertificado, 'idAluno' => $idAluno));
	}
	public function bindCertificado($idPedido, $idCertificado, $idAtividade) {
        $this->db->where('id', $idAtividade);
        $this->db->where('codPedido', $idPedido);
        if ($idCertificado == 0)
        	$this->db->set('idCertificado', NULL);
        else
        	$this->db->set('idCertificado', $idCertificado);
        $this->db->update('atividade');
	}
		
}