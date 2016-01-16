<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Inicio
 *
 * @author Cristiano
 */
class Inicio extends CI_Controller {

    public function index() {
  
          $data['action'] = site_url('Pessoa/adicionarPessoa');
          $this->load->model('EstadoModel','',TRUE);
          $data['estados']= $this->EstadoModel->SelectAllEstados();
          $this->load->template('pessoa/cadastroPessoaView',$data);
              
    }

}
