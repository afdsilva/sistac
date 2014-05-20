<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aluno extends CI_Controller {
    
    public 
    
    function __construct() {
        parent::__construct();
        $this->load->model('alunoModel', 'alunomodel');
        $this->load->model('pedidoModel', 'pedidomodel');
    }
    
    function index() {
        $data['pedido'] = $this->pedidomodel->getPedido(01767688075);
        $this->load->view('include/header');
        $this->load->view('alunoView', $data);
        $this->load->view('include/footer');
    }
    
    function getPedido(){
        
        $data['pedido'] = $this->pedidomodel->getPedido(01767688075);
        
    }
    
    function enviarPedido(){
        
        
    }
    
    function importarPedido(){
        
        
    }
    
    function salvarPedido(){
        
        
    }
    
    
}