<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller {

    var $navigation = array('navigation' => array('aluno' => 'Aluno'));
    var $data = array('erro' => '', 'pedido' => '', 'aluno' => '', 'atividades' => '', 'upload_data' => '');

    public function __construct() {
        parent::__construct();
        
        $this->load->model('alunoModel');
        $this->load->model('cursoModel');
        $this->load->model('atividadeModel');
        $this->load->model('tipoAtividadeModel');
        $this->load->model('categoriaModel');
        
    }

    function index($id = '') {
        if(!$this->session->userdata('user')) redirect('login', 'refresh');

        $this->data['error'] = $this->session->userdata('error');
        
        $this->session->set_userdata(array('error' => ""));
        $aluno = $this->alunoModel->getAluno($this->session->userdata('user')->cpf);
        $this->navigation['navigation']['aluno'] = $aluno->nome;
        $this->data['aluno'] = $aluno;
        $this->data['pedido'] = $this->alunoModel->getPedido($this->session->userdata('user')->cpf);
        $idPedido = (isset($this->data['pedido']->id) ? $this->data['pedido']->id : '');
        $this->data['atividades'] = $this->atividadeModel->getAtividades($idPedido);
	
        $categorias = $this->categoriaModel->getCategorias();
        foreach ($categorias as $ca) {

          if ($ca->id == 1) {
            $this->data['horasPesquisa'] = $this->calculaHoras($ca->id, $idPedido);
          } elseif ($ca->id == 2) {
            $this->data['horasEnsino'] = $this->calculaHoras($ca->id, $idPedido);
          } elseif ($ca->id == 3) {
            $this->data['horasExtensao'] = $this->calculaHoras($ca->id, $idPedido);
          }
        }
        $this->data['logged'] = true;
        // monta view
        //==============================================================
        $this->load->view('include/header', $this->data);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('aluno/alunoView', $this->data);
        $this->load->view('include/footer');
    }

    function pedido() {
        if(!$this->session->userdata('user')) redirect('login', 'refresh');
        
        //monta navegacao e header
        
        $this->data['aluno'] = $aluno = $this->alunoModel->getAluno($this->session->userdata('user')->cpf);
        $this->data['pedido'] = $pedido = $this->alunoModel->getPedido($this->session->userdata('user')->cpf);

        $idPedido = $pedido->id;

        $this->navigation['navigation']['aluno'] = $aluno->nome;
        $this->navigation['navigation']['pedido'] = array('name' => 'Pedido', 'active' => true);
        $this->navigation['navigation']['aluno/pedido'] = $idPedido;
        
        $tipoAtividades = $this->tipoAtividadeModel->getTipoAtividades();
        $this->data['tipoAtividades'][0] = "Selecione um Tipo de Atividade";
        foreach ($tipoAtividades as $tipoAtividade) {
        	$this->data['tipoAtividades'][$tipoAtividade->id] = $tipoAtividade->nome;
        }
        $categorias = $this->categoriaModel->getCategorias();
        $this->data['categorias'][0] = "Selecione uma Categoria";
        foreach ($categorias as $categoria) {
        	$this->data['categorias'][$categoria->id] = $categoria->nome;
        }
        $this->data['atividades'] = $this->atividadeModel->getAtividades($idPedido);
        $this->data['certificados'] = $this->alunoModel->getCertificados($this->session->userdata('user')->cpf); 
        
        if(!$this->data['pedido']) redirect('/aluno/', 'refresh');

        $this->data['logged'] = true;
        
        $this->load->view('include/header', $this->data);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('aluno/alunoPedidoEditarView', $this->data);
        $this->load->view('include/footer');
    }
	function excluirPedido($idUsuario) {
		$this->alunoModel->removePedidos($idUsuario);
		redirect('/aluno/', 'refresh');
	}
	
    function novoPedido($idUsuario) {

        $config['allowed_types'] = '*';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('novoPedido')) {
        	$error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata(array('error' => $error));
        	redirect('/aluno/', 'refresh');
        } else {
        	
            //upload do arquivo coloca o conteudo na variavel $content e remove o arquivo apos uso
            $upload_data = $this->upload->data();
        	$tmpName = $upload_data['full_path'];
            $fileSize = $upload_data['file_size'];
            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            fclose($fp);
            unlink($tmpName);
            //decodifica json
            $json = json_decode($content);
            //remove pedido(s) anterior(es)
            $this->alunoModel->removePedidos($idUsuario);
            //cria novo pedido
            $idPedido = $this->alunoModel->insertNovoPedido($idUsuario,$json->{'registry'});
            $pedido['codCurso'] = $codCurso = $json->{'cod'};
            if ($codCurso)
                $pedido['nomeCurso'] = $this->cursoModel->getCurso($codCurso)->nome;
            $atividades = $json->{'activity'};
            $i = 1;
            foreach ($atividades as $atividade) {
                $tipoAtividade = $atividade->{'typeOfActivity'};
                $categoria = $atividade->{'category'};
                $descricao = $atividade->{'description'};
                $unidadeAtividade = $atividade->{'time'};
                
                $hr = $this->tipoAtividadeModel->getTipoAtividade($tipoAtividade)->horas;
                
                if($unidadeAtividade > $hr){
                   $aproveitamento = $hr;
                } else {
                    $aproveitamento = $unidadeAtividade;
                }
                
                $pedido['descricao'] = $descricao;
                $pedido['codTipoAtividade'] = $tipoAtividade;
                $pedido['codCategoria'] = $categoria;
                $pedido['unidadeAtividade'] = $unidadeAtividade;
                $pedido['aproveitamento'] = $aproveitamento;
                $pedido['codPedido'] = $idPedido;
                $pedido['id'] = $i;

                $this->atividadeModel->insertAtividade($pedido);
                $i++;
            }
            redirect('/aluno/', 'refresh');
        }
    }
	//adiciona um certificado a um aluno
    function inserirCertificado($idAluno) {
    	
        
        $config['upload_path'] = './arquivos/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = '20000';
        //$config['file_name'] = 'certificado' . $idAluno . $file_name;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('fileCertificado')) {
            $erro = array('error' => $this->upload->display_errors());
            //print_r($erro);
        } else {
        	$data = array();
        	$data['descricao'] = $this->input->post()['descricaoCertificado'];
        	$data['arquivo'] = $this->upload->data()['file_name'];
        	$this->alunoModel->insertNovoCertificado($idAluno,$data);
        	
        }
        
        redirect('/aluno/pedido/', 'refresh');
    }
	//vincula um certificado a uma atividade, callback true usado para modificar dinamicamente, false retorna a pagina
	function bindCertificado($idPedido, $idAtividade, $idCertificado, $callback = false) {
		//chama a funcao quando o id do certificado for 0, usado nas chamadas dinamicas da lista de atividades
		$this->alunoModel->bindCertificado($idPedido, $idCertificado, $idAtividade);
		if ($callback === false)
			redirect('/aluno/pedido/', 'refresh');
		echo "success";
	}

	//baixa um certificado vinculado a um aluno
    function downloadCertificado($idAluno,$idCertificado) {
    	$this->load->helper('download');
    	$result = $this->alunoModel->getCertificado($idAluno,$idCertificado);
    	$arquivo = 'arquivos/' . $result->arquivo;
    	$info = pathinfo($arquivo);
    	$data = file_get_contents($arquivo);
    	force_download($result->descricao.".".$info['extension'], $data);
    }
    //remove um certificado vinculado a um pedido
    function deleteCertificado($idAluno, $idCertificado) {
    	$result = $this->alunoModel->getCertificado($idAluno,$idCertificado);
    	$arquivo = './arquivos/' . $result->arquivo;
    	$this->alunoModel->removeCertificado($idAluno, $idCertificado);
    	if (is_file($arquivo))
    		unlink($arquivo);
    	redirect('/aluno/pedido/', 'refresh');
	}
        
        
   /**
     * Calcula as horas da atividades referente as categorias
     * 
     * @param type $categoriaId
     * @param type $pedidoId
     * @return type
     */
    function calculaHoras($categoriaId, $pedidoId) {

        // verifica o tamanho dos tipos de atividade
      $size = $this->tipoAtividadeModel->getCountTipoAtividades();
        // zera o vetor de controle
        // :: O vetor de controle em cada posição contém o somatório de horas
        //    das atividades que o aluno possui, sendo dividido pelas categorias
        //    pesquisa ensino e extensão.
      for ($i = 1; $i <= $size; $i++) {
        $controle[$i] = 0;
      }

      $atividades = $this->atividadeModel->refreshAluno($pedidoId)['Records'];

        // percorre todas as atividades
      foreach ($atividades as $a) {
            // verifica se a atividade corrente é da categoria analisada.
            // se sim: contabiliza na posição do tipo atividade
        if ($a->categoriaId == $categoriaId) {
          $controle[$a->tipoAtividadeId] += $a->aproveitamento;
        }
      }

      $tipoAtividades = $this->tipoAtividadeModel->getTipoAtividades();

      $retorno = 0;
      foreach ($tipoAtividades as $ta) {

            // verifica se o somatório da posição é maior que máximo de horas
            // que o aluno tem.
            // se sim: muda para o maxHoras
            // se não: deixa como ta
        if ($controle[$ta->id] > $ta->maxHoras) {
          $controle[$ta->id] = $ta->maxHoras;
        }

        $retorno += $controle[$ta->id];
      }
      return $retorno;
    }    
        

}
