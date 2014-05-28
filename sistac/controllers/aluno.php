<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aluno extends CI_Controller {

    var $navigation = array('navigation' => array('aluno' => 'Aluno'));
    var $data = array('erro' => '', 'pedido' => '', 'aluno' => '', 'atividades' => '', 'upload_data' => '');

    public function __construct() {
        parent::__construct();
        $this->load->model('alunoModel');
        $this->load->model('cursoModel');
        $this->load->model('pedidoModel');
        $this->load->model('atividadeModel');
        $this->load->model('tipoAtividadeModel');
        $this->load->model('categoriaModel');
        $this->load->helper('file');
    }

    function index($id = '') {
        if (!($idAluno = $this->session->userdata('user')->cpf))
            redirect('/login/', 'refresh');
        $aluno = $this->alunoModel->getAluno($idAluno);
        $this->navigation['navigation']['aluno'] = $aluno->nome;
        $this->data['aluno'] = $aluno;
        $this->data['pedidos'] = $this->pedidoModel->getPedidos($idAluno);
        $idPedido = (isset($this->data['pedido']->id) ? $this->data['pedido']->id : '');
        $this->data['atividades'] = $this->atividadeModel->getAtividades($idPedido);

        // monta view
        //==============================================================
        $this->load->view('include/header', $this->navigation);
        $this->load->view('include/navigation', $this->navigation);
        $this->load->view('aluno/alunoView', $this->data);
        $this->load->view('include/footer');
    }

    function pedido($idPedido = '', $acao = '', $idAcao = '') {

        if (!($idAluno = $this->session->userdata('user')->cpf))
            redirect('/login/', 'refresh');

        $this->navigation['navigation']['pedido'] = 'Pedido';

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

        // monta view
        //==============================================================
        $this->load->view('include/header', $this->navigation);

        $this->data['aluno'] = $this->alunoModel->getAluno($idAluno);
        if ($idPedido == 'novo') {
            $this->navigation['navigation']['novo'] = 'Novo';
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('aluno/alunoPedidoNovoView', $this->data);
        } else {
            $this->navigation['navigation'][$idPedido] = $idPedido;
            $this->data['pedido'] = $this->pedidoModel->getPedido($idAluno);
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

            if (!$this->data['pedido'])
                redirect('/aluno/', 'refresh');
            $this->load->view('include/navigation', $this->navigation);
            $this->load->view('aluno/alunoPedidoEditarView', $this->data);
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
            fclose($fp);
            unlink($tmpName);
            $json = json_decode($content);
            $idPedido = $this->pedidoModel->insertNovoPedido($this->input->post('codUsuario'));
            $pedido['codCurso'] = $codCurso = $json->{'cod'};
            echo $codCurso;
            $curso = $this->cursoModel->getCurso($codCurso);

            if ($curso)
                $pedido['nomeCurso'] = $this->cursoModel->getCurso($codCurso)->nome;
            $atividades = $json->{'activity'};
            $i = 1;
            foreach ($atividades as $atividade) {
                $tipoAtividade = $atividade->{'typeOfActivity'};
                $categoria = $atividade->{'category'};
                $descricao = $atividade->{'description'};
                $unidadeAtividade = $atividade->{'time'};
                echo "<br />";
                echo $tipoAtividade;
                echo "<br />";
                echo $categoria;
                echo "<br />";
                echo $descricao;
                echo "<br />";
                echo $unidadeAtividade;
                echo "<br />";
                echo $i;

                echo "<br />";
                echo "<br />";
                echo "<br />";


                if (strcasecmp($categoria, 'Extensão')) {

                    $categoria = 3;
                }
                if (strcasecmp($categoria, 'Ensino')) {
                    $categoria = 2;
                }
                if (strcasecmp($categoria, 'Pesquisa')) {
                    $categoria = 1;
                }
                $pedido['descricao'] = $descricao;
                $pedido['codTipoAtividade'] = 1;
                $pedido['codCategoria'] = $categoria;
                $pedido['unidadeAtividade'] = $unidadeAtividade;
                $pedido['codPedido'] = $idPedido;
                $pedido['id'] = $i;

                $this->atividadeModel->insertAtividade($pedido);
                $i++;
            }
        }
    }

    function inserirCertificado() {

        $idAtividade = $this->input->post('cmbAtividade');
        $idPedido = $this->input->post('idPedido');

        $config['upload_path'] = './arquivos/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = '20000';
        $config['file_name'] = 'certificado' . $idPedido . $idAtividade;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $erro = array('error' => $this->upload->display_errors());
            $this->load->view('upload_success', $erro);
        } else {
            $this->atividadeModel->setArquivoURL($idPedido, $idAtividade, $this->upload->data()['file_name']);
            $data = array('upload_data' => $this->upload->data(), 'idPedido' => $idPedido);
            $this->load->view('upload_success', $data);
        }
    }

    function removerCertificado() {
        $idPedido = $_POST['idPedido'];
        $idAtividade = $_POST['idAtividade'];
        $file = $this->atividadeModel->getAtividade($idAtividade, $idPedido)->arquivoURL;
        $this->atividadeModel->removerCertificado($idPedido, $idAtividade);

        if (unlink('/var/www/sistac/arquivos/' . $file)) {
            echo 'sucesso';
        } else {
            echo 'falha';
        }
    }

    function downloadCertificado() {
        $file = $_POST['arquivoURL'];
        $this->load->helper('download');
        $data = file_get_contents($file); // Read the file's contents
        $name = 'sistac';
        force_download($name, $data);
    }

    function removerPedido() {
        $idPedido = $_POST['parametros'];

        $this->atividadeModel->removerAtividades($idPedido);
        $this->pedidoModel->removerPedido($idPedido);
    }

}
