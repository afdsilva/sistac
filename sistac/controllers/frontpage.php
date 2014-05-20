<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontpage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categoriaModel', 'categoriamodel');
    }
    
   public function index(){
        $data['categorias'] = $this->categoriamodel->getCategorias();
        $this->load->view('include/header');
        $this->load->view('frontpageView', $data);
        $this->load->view('include/footer');
   }
   
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */