<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of AlterarProcesso
 *
 * @author 016255421
 */
class AlterarProcesso extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load();
    }

    public function index() {
     $this->output->enable_profiler(TRUE);
        $id = $this->input->post('id_processo');
        if (isset($id)) {

            $processo ['processo'] = $this->ProcessoModel->getProcessoById($id);
            $this->load->template('processo/editarProcessoView', $processo);
        } else {

            redirect('processo/abrirConsulta');
        }
    }

    public function editar() {

        $this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('descricao', 'Descrição do processo ', 'required');
        $this->ProcessoModel->nome = $this->input->post('nome');
        $this->ProcessoModel->id_processo = $this->input->post('id_processo');
        $this->ProcessoModel->cpf = $this->input->post('cpf');
        $this->ProcessoModel->numero_processo = $this->input->post('numero');
        $this->ProcessoModel->data_inicio = dataMysqlParaPtBr($this->input->post('datainicio'));
        $this->ProcessoModel->status_processo = $this->input->post('status');
        $this->ProcessoModel->descricao = trim($this->input->post('descricao'));


        if ($this->ProcessoModel->status_processo == '1') {

            $this->form_validation->set_rules('dataencerramento', 'Data de encerramento do processo', 'required|data_valida');
            $this->ProcessoModel->data_encerramento = $this->input->post('dataencerramento');
        }


        if ($this->form_validation->run()) {

            $this->ProcessoModel->data_encerramento = empty($this->input->post('dataencerramento')) ? NULL : dataPtBrParaMysql($this->input->post('dataencerramento'));
            $this->ProcessoModel->editarProcesso();
            $this->session->set_flashdata("success", "Processo alterado com sucesso.");
              redirect('processo/abrirConsulta');
         
        } else {
            $processo['processo'] = $this->ProcessoModel;
            $this->load->template('processo/editarProcessoView', $processo);
        }
    }

    public function load() {

        $this->load->model('ProcessoModel', '', TRUE);
        $this->load->model('PessoaModel', '', TRUE);
        $this->load->model('TipoProcessoModel', '', TRUE);
    }

}
