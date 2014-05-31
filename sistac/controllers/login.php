<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('loginModel');
    }

    function index() {
        $this->load->helper('form');
        $this->load->view('include/header');
        $this->load->view('loginView');
        $this->load->view('include/footer');
    }

    function validate() {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $query = $this->loginModel->validate($user, $pass);

        if ($query) {
            $this->session->set_userdata(array("user" => $query));

            switch ($query->codTipoUsuario) {
                case 1:
                    echo "Administrdor";
                    break;
                case 2:
                    echo "Gerenciador";
                    break;
                case 3:
                    echo "Coordenador";
                    break;
                case 4:
                    echo "Aluno";
                    //redirect('aluno', 'refresh');
                    break;
                default:
                    redirect($this->index());
            }

            var_dump($this->session->userdata("user"));
        } else {
            redirect($this->index());
        }
    }

}
