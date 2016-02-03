<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Login
 *
 * @author 016255421
 */
class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load();
    }

    public function index() {
        //$this->output->enable_profiler(TRUE);
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            $this->load->view("loginView");
            return;
        }

        redirect("/pessoa");
    }

    public function verificarUser() {
        //$this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if (!$this->form_validation->run()) {

            $this->load->view("loginView");
            return;
        }
        $senha = md5($this->input->post('senha'));
        $email = $this->input->post('email');
        $usuario = $this->UsuarioModel->getUsuarioByLogin($email, $senha);
        if ($usuario == NULL) {

            $this->session->set_flashdata("danger", "Usuário não encontrado.");
            redirect(current_url());
        }

        $this->session->set_userdata("usuario", $usuario);
        redirect('/pessoa');
    }

    public function sairSistema() {

        $usuarioLogado = $this->session->userdata("usuario");
        if ($usuarioLogado) {

            $this->session->unset_userdata("usuario");
            redirect('/login');
        }
    }

    public function load() {
        $this->load->model('UsuarioModel', '', TRUE);
    }

}
