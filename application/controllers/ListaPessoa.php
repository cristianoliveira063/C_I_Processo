<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of ListaPessoa
 *
 * @author 016255421
 */
class ListaPessoa extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load();
    }

    public function lista() {

        //$this->output->enable_profiler(TRUE);
        $maximo =10;
        $param['tipo'] = 2;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $config['base_url'] = site_url("listaPessoa/lista");

        $config['total_rows'] = $this->PessoaModel->contAllPessoa($param);
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
        $pessoa["paginacao"] = $this->pagination->create_links();
        $param['maximo'] = $maximo;
        $param['inicio'] = $inicio;
        $pessoa["pessoas"] = $this->PessoaModel->selectAllPessoa($param);
        $this->load->template("pessoa/listaPessoaView",$pessoa);
    }

    public function getPessoaJsonId() {

        $id = $this->input->post('param');
        $this->PessoaModel = $this->PessoaModel->selectallPessoaById($id);
        $this->PessoaModel->data_nascimento = dataMysqlParaPtBr($this->PessoaModel->data_nascimento);
        echo json_encode($this->PessoaModel);
    }

    public function delete() {
        $this->output->enable_profiler(TRUE);
        $id = $this->input->post('id_pessoa');
        $this->PessoaModel->deletePessoaById($id);
        $this->session->set_flashdata("success", "Registro excluido com sucesso.");
        redirect('listaPessoa/lista');
    }

    public function pesquisar() {

        $this->output->enable_profiler(TRUE);
        $variavel = $this->input->post('pesquisa');
        $maximo = 10;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $config['base_url'] = site_url("listaPessoa/pesquisar");
        $param['maximo'] = $maximo;
        $param['inicio'] = $inicio;

        if (is_digito($variavel) && strlen($variavel) > 4) {
            $param['atributo'] = 'cpf';
            $param['valor'] = $variavel;
            $pessoa['pessoas'] = $this->PessoaModel->getPessoaByLike($param);
            $config['total_rows'] = $this->PessoaModel->getContAllLike($param);
        } else if (nome_valido($variavel) && strlen($variavel) > 3) {
            $param['atributo'] = 'nome';
            $param['valor'] = $variavel;
            $pessoa['pessoas'] = $this->PessoaModel->getPessoaByLike($param);
            $config['total_rows'] = $this->PessoaModel->getContAllLike($param);
        }

        if (!isset($pessoa)) {
            $param['tipo'] = 2;
            $pessoa["pessoas"] = $this->PessoaModel->selectAllPessoa($param);
            $config['total_rows'] = $this->PessoaModel->contAllPessoa($param);
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
        $pessoa["paginacao"] = $this->pagination->create_links();
        $this->load->template("pessoa/listaPessoaView", $pessoa);
    }

    public function load() {

        $this->load->model('PessoaModel', '', TRUE);
        $this->load->model('EnderecoModel', '', TRUE);
        $this->load->model('EstadoModel', '', TRUE);
    }

}
