<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of ListaProcesso
 *
 * @author 016255421
 */
class ListaProcesso extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load();
    }

    public function index() {
        $this->output->enable_profiler(TRUE);
        $processo['processos'] = $this->ProcessoModel->getAllProcessoExibir();

        $this->load->template("processo/listaProcessoView", $processo);
    }

    public function getProcessoJsonByid() {
        // $this->output->enable_profiler(TRUE);
        $id = $this->input->post('param');
        $this->ProcessoModel = $this->ProcessoModel->getProcessoById($id);
        $this->ProcessoModel->data_inicio = dataMysqlParaPtBr($this->ProcessoModel->data_inicio);
        echo json_encode($this->ProcessoModel);
    }

    public function deleteProcesso() {
        //$this->output->enable_profiler(TRUE);
        $id = $this->input->post('id_processo');
        $this->ProcessoModel->deleteProcessoById($id);
        $this->session->set_flashdata("success", "Processo excluído com sucesso.");
        redirect('/ListaProcesso');
    }

    public function pesquisaProcesso() {
        $this->output->enable_profiler(TRUE);
        $variavel = $this->input->post('pesquisa');
     
        if (is_digito($variavel) && strlen($variavel) > 4) {
            
            $processo['processos'] = $this->ProcessoModel->getProcessoByLike('numero_processo', $variavel);
            
        } else if (nome_valido($variavel) && strlen($variavel) > 3) {

            $processo['processos'] = $this->ProcessoModel->getProcessoByLike('nome', $variavel);
        }

        if (!isset($processo)) {

            $processo['processos'] = $this->ProcessoModel->getAllProcessoExibir();
        }

        
        $this->load->template("processo/listaProcessoView", $processo);
    }

    public function load() {

        $this->load->model('ProcessoModel', '', TRUE);
        $this->load->model('PessoaModel', '', TRUE);
    }

}
