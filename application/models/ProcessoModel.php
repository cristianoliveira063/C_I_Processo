<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcessoModel
 *
 * @author 016255421
 */
class ProcessoModel extends CI_Model {

    public  $id_processo;
    public $numero_processo;
    public $data_inicio;
    public $pessoa_id;
    public $id_tipo_processo;
    public $descricao;
    public $status_processo;
    public  $data_encerramento;

    public function __construct() {
        parent::__construct();
    }

    public function insertProcesso() {

        $this->db->insert('processo', $this);
    }

    public function getProcessoByNumeroProcesso($numero) {

        if ($numero == NULL || empty($numero)) {

            return NULL;
        }

        // $query = $this->db->get_where('processo', array('numero_processo' => $numero));
        $this->db->select("processo.*", FALSE);
        $this->db->select("pessoa.nome", FALSE);
        $this->db->select("pessoa.cpf", FALSE);
        $this->db->select("tipo_processo.nome_tipo_processo", FALSE);
        $this->db->from('processo');
        $this->db->where('processo.numero_processo', $numero);
        $this->db->join('pessoa', 'pessoa.id_pessoa = processo.pessoa_id');
        $this->db->join('tipo_processo', 'tipo_processo.id_tipo_processo = processo.id_tipo_processo');
        $query = $this->db->get();
        //return $query->result_object();
        return $query->row_object();
    }

    public function getAllProcesso() {
        $query = $this->db->get('processo');
        return $query->result_object();
    }

}
