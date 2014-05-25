<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aluno extends CI_Controller {
    
    public 
    
    function __construct() {
        parent::__construct();        
        $this->load->helper(array('form', 'url'));
        $this->load->model('alunoModel', 'alunomodel');
        $this->load->model('pedidoModel', 'pedidomodel');
        $this->load->model('atividadeModel', 'atividademodel');
        
    }
    
    function index() {
        $data['pedido'] = $this->pedidomodel->getPedido('2', '01767688075');
        $data['atividades'] = $this->atividademodel->getAtividades(2);
        $data['error'] = ' ';
        $this->load->view('include/header');
        $this->load->view('alunoView', $data);
        $this->load->view('include/footer');
    }
    
    public function upCertificado() {
        $config['upload_path'] = './arquivos/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size']	= '0';
	$config['max_width']  = '0';
	$config['max_height']  = '0';
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('alunoView', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data['pedido'] = $this->pedidomodel->getPedido('2', '01767688075');
            $data['atividades'] = $this->atividademodel->getAtividades(2);
            $data['error'] = ' ';
            $this->load->view('alunoView', $data);
        }
    }
    
}