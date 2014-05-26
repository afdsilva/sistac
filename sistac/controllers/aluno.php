<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aluno extends CI_Controller {

    var $navigation = array('navigation' => array('aluno' => 'Aluno'));
    var $data = array('erro' => '', 'pedido' => '', 'aluno' => '', 'atividades' => '', 'upload_data' => '');

    public function __construct() {
        parent::__construct();
        $this->load->model('alunoModel'); //me expliquem depois pq $this->load->model('alunoModel','alunomodel')... 
        $this->load->model('cursoModel');
        $this->load->model('pedidoModel');
        $this->load->model('atividadeModel');
        $this->load->model('tipoAtividadeModel');
        $this->load->model('categoriaModel');
    }

    function index($id = '') {
        //login teste
        if ($id) {
            $aluno = $this->alunoModel->getAluno($id);
            //print_r($aluno);
            //return;
            if ($aluno) {
                $this->session->set_userdata('idAluno', $aluno->cpf);
                redirect('/aluno/', 'refresh');
            } else
                redirect('/login/', 'refresh');
        }
        if (!($idAluno = $this->session->userdata('idAluno')))
            redirect('/login/', 'refresh');
        $aluno = $this->alunoModel->getAluno($idAluno);
        $this->navigation['navigation']['aluno'] = $aluno->nome;
        if (!$this->session->userdata('idAluno'))
            redirect('/login/', 'refresh');
        $this->data['aluno'] = $aluno;
        $this->data['pedido'] = $this->pedidoModel->getPedido($idAluno);
        $this->data['atividades'] = $this->atividadeModel->getAtividades($this->data['pedido']->id);
        //monta view
        $this->load->view('include/header', $this->navigation);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('alunoIndexView', $this->data);
        $this->load->view('include/footer');
    }

    function pedido($idPedido = '', $acao = '', $idAcao = '') {

        $this->navigation['navigation']['pedido'] = 'Pedido';

        if (!($idAluno = $this->session->userdata('idAluno')))
            redirect('/login/', 'refresh');
        $aluno = $this->alunoModel->getAluno($idAluno);
        $this->navigation['navigation']['aluno'] = $aluno->nome;
        //redireciona para url de edicao de pedidos
        if ($editar = $this->input->post('editar')) {
            redirect('/aluno/pedido/' . $editar, 'refresh');
        }
        if ($novo = $this->input->post('novo')) {
            redirect('/aluno/pedido/novo', 'refresh');
        }
        if ($remover = $this->input->post('remover')) {
            //remove o pedido
            redirect('/aluno/', 'refresh');
        }

        if ($acao == 'atividade') {
            $removerAtividade = $this->input->post('removerAtividade');
            //echo $idPedido . "    " . $removerAtividade;
            $this->atividadeModel->deleteAtividade($idPedido, $removerAtividade);
            //echo $this->db->last_query();
            redirect('/aluno/pedido/' . $idPedido, 'refresh');
        }

        //monta view
        $this->load->view('include/header', $this->navigation);

        $this->data['aluno'] = $this->alunoModel->getAluno($idAluno);
        if ($idPedido == 'novo') {
            $this->navigation['navigation']['novo'] = 'Novo';
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('alunoPedidoNovoView', $this->data);
        } else {
            $this->navigation['navigation'][$idPedido] = $idPedido;
            $this->data['pedido'] = $this->pedidoModel->getPedido($idPedido, $idAluno);
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
            //$this->data['categorias'] = $this->categoriaModel->getCategorias();
            $this->data['atividades'] = $this->atividadeModel->getAtividades($idPedido);

            //echo $this->db->last_query();
            if (!$this->data['pedido'])
                redirect('/aluno/', 'refresh');
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('alunoPedidoView', $this->data);
        }

        $this->load->view('include/footer');
    }

    function uploadPedido() {
        $config['allowed_types'] = '*';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('uploadPedido')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return;
        } else {
            //upload do arquivo coloca o conteudo na variavel $content e remove o arquivo apos uso
            $upload_data = $this->upload->data();
            $tmpName = $upload_data['full_path'];
            $fileSize = $upload_data['file_size'];
            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            //$content = addslashes($content);
            fclose($fp);
            unlink($tmpName);

            $json = json_decode($content);
            $pedido['nome'] = $nome = $json->{'name'};
            $pedido['codCurso'] = $codCurso = $json->{'cod'};
            $curso = $this->cursoModel->getCurso($codCurso);
            if ($curso)
                $pedido['nomeCurso'] = $this->cursoModel->getCurso($codCurso)->nome;
            $atividades = $json->{'activity'};
            $i = 0;
            $idPedido = $this->input->post('idPedido');

            foreach ($atividades as $atividade) {
                $tipoAtividade = $atividade->{'typeOfActivity'};
                $categoria = $atividade->{'category'};
                $descricao = $atividade->{'description'};
                $unidadeAtividade = $atividade->{'time'};
                $rowTipoAtividade = $this->tipoAtividadeModel->getTipoAtividadeByName($tipoAtividade);
                $rowCategoria = $this->categoriaModel->getCategoriaByName($categoria);
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
                    $lastIdAtividade = $this->db->select_max('id')->where('codPedido', $idPedido)->get('atividade')->row();
                    //echo $this->db->last_query();
                    $insert = array(
                        'id' => $lastIdAtividade->id + 1,
                        'codPedido' => $idPedido,
                        'descricao' => $descricao,
                        'unidadeAtividade' => $unidadeAtividade,
                        'codTipoAtividade' => $codTipoAtividade,
                        'codCategoria' => $codCategoria);
                    $this->atividadeModel->insertAtividade($insert);
                }
            }
            $data['pedido'] = $pedido;
            redirect('/aluno/pedido/' . $idPedido, 'refresh');
        }
    }

    public function upCertificado(){
        
        $idAtividade = $this->input->post('cmbAtividade');
        $idPedido = $this->input->post('idPedido');
        
        $config['upload_path'] = './arquivos/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = '20000';
        $config['file_name'] = 'certificado' . $idPedido . $idAtividade;
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $erro = array('error' => $this->upload->display_errors());
            $this->load->view('upload_success', $erro);
        } else {
            $this->atividadeModel->setArquivoURL($idPedido, $idAtividade, $this->upload->data()['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }

    public function download() {
        $file = $_POST['arquivoURL'];
        $this->load->helper('download');
        $data = file_get_contents($file); // Read the file's contents
        $name = 'sistac';
        force_download($name, $data);
    }
}
