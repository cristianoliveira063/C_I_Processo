<?php

/**
 * Description of UsuarioModel
 *
 * @author 016255421
 */
class UsuarioModel extends CI_Model {

    public $id_usuario;
    public $pessoa_id;
    public $status_acesso;
    public $senha;

    public function __construct() {

        parent::__construct();
    }

    public function insertUsuario() {
        $this->db->trans_begin();
        $this->db->insert('usuario', $this);
        $pessoa = array(
            'tipo_pessoa' => 1
        );

        $this->db->where('id_pessoa', $this->pessoa_id);
        $this->db->update('pessoa', $pessoa);

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
        } else {

            $this->db->trans_rollback();
        }
    }

    public function getUsuarioByCpf($cpf) {
        $this->db->select("usuario.*", FALSE);
        $this->db->select("pessoa.nome", FALSE);
        $this->db->select("pessoa.cpf", FALSE);
        $this->db->from('usuario');
        $this->db->where('pessoa.cpf', $cpf);
        $this->db->join('pessoa', 'pessoa.id_pessoa = usuario.pessoa_id');
        $query = $this->db->get();
        //return $query->result_object();
        return $query->row_object();
    }

    public function getUsuarioByLogin($email, $senha) {
        $this->db->select("usuario.*", FALSE);
        $this->db->select("pessoa.nome", FALSE);
        $this->db->select("pessoa.email", FALSE);
        $this->db->from('usuario');
        $this->db->where('pessoa.email', $email);
        $this->db->where('usuario.senha', $senha);
        $this->db->join('pessoa', 'pessoa.id_pessoa = usuario.pessoa_id');
        $query = $this->db->get();
        //return $query->result_object();
        return $query->row_object();
    }

}
