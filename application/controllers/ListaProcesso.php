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

    public function lista() {
        $this->output->enable_profiler(TRUE);
        $maximo = 10;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $config['base_url'] = site_url("listaProcesso/lista");

        $config['total_rows'] = $this->ProcessoModel->contaProcessos();
        $config['per_page'] = $maximo;
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '<span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-left"></span>';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $processo["paginacao"] = $this->pagination->create_links();
        $processo["processos"] = $this->ProcessoModel->getAllProcessoExibir($maximo, $inicio);
        $this->load->template("processo/listaProcessoView", $processo);
    }

    public function getProcessoJsonByid() {
        $id = $this->input->post('param');
        $this->ProcessoModel = $this->ProcessoModel->getProcessoById($id);
        $this->ProcessoModel->data_inicio = dataMysqlParaPtBr($this->ProcessoModel->data_inicio);
        echo json_encode($this->ProcessoModel);
    }

    public function delete() {
        $id = $this->input->post('id_processo');
        $this->ProcessoModel->deleteProcessoById($id);
        $this->session->set_flashdata("success", "Processo excluído com sucesso.");
        redirect('/listaProcesso/');
    }

    public function pesquisa() {
        $this->output->enable_profiler(TRUE);
        $variavel = $this->input->post('pesquisa');
        $maximo = 10;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $config['base_url'] = site_url("listaProcesso/pesquisa");
        $param['maximo'] = $maximo;
        $param['inicio'] = $inicio;

        if (is_digito($variavel) && strlen($variavel) > 4) {
            $param['atributo'] = 'numero_processo';
            $param['valor'] = $variavel;
            $processo['processos'] = $this->ProcessoModel->getProcessoByLike($param);
            $config['total_rows'] = $this->ProcessoModel->contaProcessoslike($param);
        } else if (nome_valido($variavel) && strlen($variavel) > 3) {
            $param['atributo'] = 'nome';
            $param['valor'] = $variavel;
            $processo['processos'] = $this->ProcessoModel->getProcessoByLike($param);
            $config['total_rows'] = $this->ProcessoModel->contaProcessoslike($param);
        }

        if (!isset($processo)) {
            $processo['processos'] = $this->ProcessoModel->getAllProcessoExibir($maximo, $inicio);
            $config['total_rows'] = $this->ProcessoModel->contaProcessos();
          
        }

        $config['per_page'] = $maximo;
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $processo["paginacao"] = $this->pagination->create_links();
        $this->load->template("processo/listaProcessoView", $processo);
    }

    public function load() {
        $this->load->library('pagination');
        $this->load->model('ProcessoModel', '', TRUE);
        $this->load->model('PessoaModel', '', TRUE);
    }

}
