<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of AlterarPessoa
 *
 * @author 016255421
 */
class AlterarPessoa extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load();
    }

    public function index() {
        $this->output->enable_profiler(TRUE);

        $id = $this->input->post('id_pessoa');
        if (is_digito($id)) {

            $dados['pessoa'] = $this->PessoaModel->selectallPessoaById($id);
            $dados['estados'] = $this->EstadoModel->SelectAllEstados();
            $this->load->template("pessoa/alterarPessoaView", $dados);
        }
    }

    public function alterar() {
         $this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('nome', 'Nome','trim|required');
        $this->form_validation->set_rules('nascimento','Data de Nascimento', 'required|data_valida');
        $this->form_validation->set_rules('fone', 'Fone', 'required|numeric');
        $this->form_validation->set_rules('bairro', 'Bairro','required');
        $this->form_validation->set_rules('bairro', 'Bairro','required');
        $this->form_validation->set_rules('estado', 'Estado','required');
        $this->form_validation->set_rules('cidade', 'Cidade','required');
        $this->form_validation->set_rules('cep', 'CEP','required|numeric');
        $this->form_validation->set_rules('logradouro','Logradouro', 'required'); 
        if($this->form_validation->run()){
                   
            $this->PessoaModel->nome = $this->input->post('nome');
            $this->PessoaModel->cpf = $this->input->post('cpf');
            $this->PessoaModel->data_nascimento = dataPtBrParaMysql($this->input->post('nascimento'));
            $this->PessoaModel->telefone = removeMask($this->input->post('fone'));
            $this->PessoaModel->email = $this->input->post('email');
            $this->EnderecoModel->bairro = $this->input->post('bairro');
            $this->EnderecoModel->estado = $this->input->post('estado');
            $this->EnderecoModel->cidade = $this->input->post('cidade');
            $this->EnderecoModel->cep = $this->input->post('cep');
            $this->EnderecoModel->logradouro = $this->input->post('logradouro');
            $this->PessoaModel->id_pessoa = $this->input->post('id_pessoa');
            $this->EnderecoModel->id_endereco = $this->i->post('id_endereco');
            $this->PessoaModel->alterarPessoaComEndereco($this->EnderecoModel);
            $this->session->set_flashdata("success", "Registro alterado com sucesso.");
            redirect('listaPessoa/lista');
                         
        }
        
       
    }
    
    
    public function load() {

        $this->load->model('PessoaModel', '', TRUE);
        $this->load->model('EnderecoModel', '', TRUE);
        $this->load->model('EstadoModel', '', TRUE);
    }

}
