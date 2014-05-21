<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uploader extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('alunoModel', 'alunomodel');
		$this->load->model('tipoAtividadeModel', 'tipoatividademodel');
		$this->load->model('categoriaModel', 'categoriamodel');
		$this->load->model('atividadeModel', 'atividademodel');
		$this->load->model('cursoModel', 'cursomodel');
		$this->load->helper('html');
	}
	
	public function index(){
		
		$this->load->view('include/header');
		$this->load->view('uploaderView', array('error' => ' ', 'pedido' => '' ));
		$this->load->view('include/footer');
	}
	
	public function do_upload() {
		$this->load->view('include/header');
		$config['allowed_types'] = '*';
		$config['upload_path'] = './uploads/';
		
		$this->load->library('upload',$config);
		if(! $this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('uploaderView', $error);
		} else {
         	//upload do arquivo coloca o conteudo na variavel $content e remove o arquivo apos uso
			$upload_data = $this->upload->data();
			$tmpName  = $upload_data['full_path'];
			$fileSize = $upload_data['file_size'];
			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			//$content = addslashes($content);
         	fclose($fp);
			unlink($tmpName);
			
			$json = json_decode($content);
			$pedido['nome'] = $nome = $json->{'name'};
			$pedido['codCurso'] = $codCurso = $json->{'cod'};
			$pedido['nomeCurso'] = $nomeCurso = $this->cursomodel->getCurso($codCurso)->nome;
			$atividades = $json->{'activity'};
			$i = 0;
			foreach ($atividades as $atividade) {
				$tipoAtividade = $atividade->{'typeOfActivity'};
				$categoria = $atividade->{'category'};
				$descricao = $atividade->{'description'};
				$unidadeAtividade = $atividade->{'time'};
				$rowTipoAtividade = $this->tipoatividademodel->getTipoAtividadeByName($tipoAtividade);
				$rowCategoria =  $this->categoriamodel->getCategoriaByName($categoria);
				if ($rowTipoAtividade && $rowCategoria) {
					$codTipoAtividade = $rowTipoAtividade->id;
					$codCategoria = $rowCategoria->id;
					$pedido['atividades'][$i]['descricao'] = $descricao;
					$pedido['atividades'][$i]['arquivoURL'] = '';
					$pedido['atividades'][$i]['unidadeAtividade'] = $unidadeAtividade; 
					$pedido['atividades'][$i]['codTipoAtividade'] = $codTipoAtividade; 
					$pedido['atividades'][$i]['nomeTipoAtividade'] = $rowTipoAtividade->nome; 
					$pedido['atividades'][$i]['codCategoria'] = $codCategoria; 
					$pedido['atividades'][$i]['nomeCategoria'] = $rowCategoria->nome;
					$i++;
				}
			}
			echo $pedido['nome'];
			$data = array(
					'upload_data' => $upload_data, 
					//'content' => $content,
					'pedido' => $pedido,
					'error' => '');
				
			$this->load->view('uploaderView', $data);
		}
		$this->load->view('include/footer');
	}
}
/* End of file uploader.php */
/* Location: ./application/controllers/uploader.php */