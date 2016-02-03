<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Processo
 *
 * @author 016255421
 */
class Processo extends MY_Controller {

    
    public function __construct() {
        
        parent::__construct();
        $this->load();
        
    }
    
    
    
    public function index() {
        $this->output->enable_profiler(TRUE);
        $pessoa = $this->session->flashdata('dados');
        if ($pessoa == NULL) {
            $this->load->template('pessoa/pesquisarPessoaView');
        } else {
            $dados['pessoa'] = $pessoa;
            $dados['tipo'] = $this->TipoProcessoModel->selectTipoProcesso();
            $this->load->template('processo/cadastroProcessoView', $dados);
        }
    }

    public function adiciona() {
        $this->output->enable_profiler(TRUE);
        $this->PessoaModel->nome = $this->input->post('nome');
        $this->PessoaModel->cpf = $this->input->post('cpf');
        if ($this->PessoaModel->nome == NULL || $this->PessoaModel->cpf == NULL) {

            redirect('pessoa/pesquisar');
            return;
        }
        $this->form_validation->set_rules('numero', 'Número processo', 'required|exact_length[12]|numeric|is_unique[processo.numero_processo]');
        $this->form_validation->set_rules('datainicio', 'Data Inicio Processo', 'required|data_valida');
        $this->form_validation->set_rules('tipoprocesso', 'Tipo Processo', 'required');
        if ($this->form_validation->run()) {

            $this->PessoaModel = $this->PessoaModel->getPessoaByCpf($this->PessoaModel->cpf);
            $this->ProcessoModel->numero_processo = $this->input->post('numero');
            $this->ProcessoModel->id_tipo_processo = $this->input->post('tipoprocesso');
            $this->ProcessoModel->descricao = $this->input->post('descricao');
            $this->ProcessoModel->pessoa_id = $this->PessoaModel->id_pessoa;
            $this->ProcessoModel->data_inicio = dataPtBrParaMysql($this->input->post('datainicio'));
            $this->ProcessoModel->status_processo = 2;
            $this->ProcessoModel->data_encerramento = $this->input->post('dataencerramento');
            if ($this->ProcessoModel->data_encerramento == NULL || empty($this->ProcessoModel->data_encerramento)) {

                $this->ProcessoModel->data_encerramento = NULL;
            }
            $this->ProcessoModel->insertProcesso();
            $this->session->set_flashdata("success", "Processo Cadastrado com sucesso.");
            redirect('pessoa/pesquisar');
        } else {
            $dados['pessoa'] = $this->PessoaModel;
            $dados['tipo'] = $this->TipoProcessoModel->selectTipoProcesso();
            $this->load->template('processo/cadastroProcessoView', $dados);
        }
    }

    public function abrirConsulta() {

        $this->load->template('processo/consultaProcessoView');
    }

    public function consulta() {
        //$this->output->enable_profiler(TRUE);

        $numero = $this->input->post('numero');
        $this->ProcessoModel = $this->ProcessoModel->getProcessoByNumeroProcesso($numero);

        if ($this->ProcessoModel == NULL) {

            echo '{"erro": "Número de Processo não encontrado"';
            echo '}';
        } else {
            $this->ProcessoModel->data_inicio = dataMysqlParaPtBr($this->ProcessoModel->data_inicio);
            echo json_encode($this->ProcessoModel);
        }
    }

    public function load() {

        $this->load->model('ProcessoModel', '', TRUE);
        $this->load->model('PessoaModel', '', TRUE);
        $this->load->model('TipoProcessoModel', '', TRUE);
       
    }

}
