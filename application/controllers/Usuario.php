<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Usuario
 *
 * @author 016255421
 */
class Usuario extends MY_Controller {

    
    
    public function __construct() {
        
        parent::__construct();
        $this->load();
    }
    
    
    public function index() {


        $this->load->template("usuario/pesquisarPessoaUserView");
    }

    public function pesquisaUser() {
       // $this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('cpf', 'CPF', 'required|numeric|exact_length[11]');

        if (!$this->form_validation->run()) {
            $this->load->template("usuario/pesquisarPessoaUserView");
            return;
        }
        
        $cpf = $this->input->post('cpf');
        $this->PessoaModel = $this->PessoaModel->getPessoaByCpf($cpf);
        if ($this->PessoaModel == NULL) {
            $this->session->set_flashdata("danger", "Usuario informado não encontrado.");
            redirect('/usuario');
        } else {
            $usuario = $this->UsuarioModel->getUsuarioByCpf($this->PessoaModel->cpf);
            if ($usuario != NULL) {
                $this->session->set_flashdata("danger", "Usuario já existe no sistema.");
                redirect('/usuario');
            }
            $dados['pessoa'] = $this->PessoaModel;
            $this->load->template("usuario/cadastroUsuarioView", $dados);
        }
    }

    public function adiciona() {

        $this->PessoaModel->nome = $this->input->post('nome');
        $this->PessoaModel->cpf = $this->input->post('cpf');
        $this->PessoaModel->id_pessoa = $this->input->post('id_pessoa');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('rsenha', 'Repita sua senha', 'required|matches[senha]');

        if (!$this->form_validation->run()) {
            $dados['pessoa'] = $this->PessoaModel;
            $this->load->template("usuario/cadastroUsuarioView", $dados);
            return;
        }
       
        $this->UsuarioModel->senha = md5($this->input->post('senha'));
        $this->UsuarioModel->pessoa_id = $this->PessoaModel->id_pessoa;
        $this->UsuarioModel->status_acesso = 1;
        $this->UsuarioModel->insertUsuario();
        $this->session->set_flashdata("success", "Usuario cadastrado com sucesso.");
        redirect('/usuario');
    }

    public function load() {

        $this->load->model('PessoaModel','', TRUE);
        $this->load->model('UsuarioModel', '', TRUE);
    }

    
    
}
