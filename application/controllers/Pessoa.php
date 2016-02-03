<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Pessoa
 *
 * @author Cristiano
 */
class Pessoa extends MY_Controller {

    public function index() {
        $this->output->enable_profiler(TRUE);
        $data['estados'] = $this->EstadoModel->SelectAllEstados();
        $this->load->template('pessoa/cadastroPessoaView', $data);
    }

    public function __construct() {

        parent::__construct();
        $this->load();
    }

    public function adicionar() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|numeric|exact_length[11]|is_unique[pessoa.cpf]');
        $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'required|data_valida');
        $this->form_validation->set_rules('fone', 'Fone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pessoa.email]');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|numeric');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required');

        if ($this->form_validation->run()) {

            $this->PessoaModel->nome = $this->input->post('nome');
            $this->PessoaModel->cpf = $this->input->post('cpf');
            $this->PessoaModel->data_nascimento = dataPtBrParaMysql($this->input->post('nascimento'));
            $this->PessoaModel->telefone = removeMask($this->input->post('fone'));
            $this->PessoaModel->email = $this->input->post('email');
            $this->PessoaModel->tipo_pessoa = 2;
            $this->EnderecoModel->bairro = $this->input->post('bairro');
            $this->EnderecoModel->estado = $this->input->post('estado');
            $this->EnderecoModel->cidade = $this->input->post('cidade');
            $this->EnderecoModel->cep = $this->input->post('cep');
            $this->EnderecoModel->logradouro = $this->input->post('logradouro');
            $this->EnderecoModel->insertPessoaComEndereco($this->PessoaModel);
            $this->session->set_flashdata("success", "cadastro efetuado com sucesso.");
            redirect('/pessoa');
        } else {
          
            $data['estados'] = $this->EstadoModel->SelectAllEstados();
            $this->load->template('pessoa/cadastroPessoaView', $data);
        }
    }

    public function incluirProcesso() {
        $this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('cpf', 'CPF', 'required|numeric|exact_length[11]');
        if ($this->form_validation->run()) {

            $cpf = $this->input->post('cpf');
            $pessoa = $this->PessoaModel->getPessoaByCpf($cpf);
            if (isset($pessoa)) {

                $this->session->set_flashdata("dados", $pessoa);
                redirect('/processo');
            } else {

                $this->session->set_flashdata("danger", "CPF informado não encontrado.");
                redirect(current_url());
            }
        } else {

            $this->load->template('pessoa/pesquisarPessoaView');
        }
    }

    public function pesquisar() {

        $this->load->template('pessoa/pesquisarPessoaView');
    }

   
  
    public function load() {

        $this->load->model('PessoaModel', '', TRUE);
        $this->load->model('EnderecoModel', '', TRUE);
        $this->load->model('EstadoModel', '', TRUE);
    }

}
