<?php

/**
 * Description of Pessoa
 *
 * @author Cristiano
 */
class PessoaModel extends CI_Model {

    public $id_pessoa;
    public $nome;
    public $cpf;
    public $data_nascimento;
    public $telefone;
    public $email;
    public $tipo_pessoa;

    public function __construct() {
        parent::__construct();
    }

    public function insertPessoa() {

        return $this->db->insert('pessoa', $this);
    }

    public function getPessoaByCpf($cpf) {

        $query = $this->db->get_where('pessoa', array('cpf' => $cpf));
        return $query->row_object();
    }

    public function getPessoaByEmail($email) {
        $query = $this->db->get_where('pessoa', array('email' => $email));
        return $query->row_object();
    }

    public function getPessoaByCodigo($codigo) {
        $query = $this->db->get_where('pessoa', array('id_pessoa' => $codigo));
        return $query->row_object();
    }

    public function selectAllPessoa($param) {

        $this->db->select("pessoa.*", FALSE);
        $this->db->select("endereco.bairro", FALSE);
        $this->db->select("endereco.estado", FALSE);
        $this->db->select("endereco.cep", FALSE);
        $this->db->select("endereco.logradouro", FALSE);
        $this->db->select("endereco.cidade", FALSE);
        $this->db->from('pessoa');
        $this->db->where('pessoa.tipo_pessoa', $param['tipo']);
        $this->db->join('endereco', 'endereco.pessoa_id = pessoa.id_pessoa');
        $this->db->limit($param['maximo'], $param['inicio']);
        $query = $this->db->get();
        return $query->result_object();
    }

    public function selectallPessoaById($id) {

        $this->db->select("pessoa.*", FALSE);
        $this->db->select("endereco.bairro", FALSE);
        $this->db->select("endereco.id_endereco", FALSE);
        $this->db->select("endereco.estado", FALSE);
        $this->db->select("endereco.cep", FALSE);
        $this->db->select("endereco.logradouro", FALSE);
        $this->db->select("endereco.cidade", FALSE);
        $this->db->select("estados.nome_uf", FALSE);
        $this->db->select("estados.id_estado", FALSE);
        $this->db->from('pessoa');
        $this->db->where('pessoa.id_pessoa', $id);
        $this->db->join('endereco', 'endereco.pessoa_id = pessoa.id_pessoa');
        $this->db->join('estados', 'estados.id_estado = endereco.estado');
        $query = $this->db->get();
        return $query->row_object();
    }

    public function contAllPessoa($param) {
         $this->db->where('pessoa.tipo_pessoa', $param['tipo']);
        return $this->db->count_all_results('pessoa');
    }

    public function getContAllLike($param) {

        $this->db->select("pessoa.*", FALSE);
        $this->db->select("endereco.bairro", FALSE);
        $this->db->select("endereco.id_endereco", FALSE);
        $this->db->select("endereco.estado", FALSE);
        $this->db->select("endereco.cep", FALSE);
        $this->db->select("endereco.logradouro", FALSE);
        $this->db->select("endereco.cidade", FALSE);
        $this->db->select("estados.nome_uf", FALSE);
        $this->db->select("estados.id_estado", FALSE);
        $this->db->from('pessoa');
        $this->db->like($param['atributo'], $param['valor']);
        $this->db->join('endereco', 'endereco.pessoa_id = pessoa.id_pessoa');
        $this->db->join('estados', 'estados.id_estado = endereco.estado');
        $this->db->limit($param['maximo'], $param['inicio']);
        return $query = $this->db->count_all_results();
    }

    public function alterarPessoaComEndereco($endereco) {

        $this->db->trans_begin();
        $pessoa = array(
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'telefone' => $this->telefone
        );
        $end = array(
            'bairro' => $endereco->bairro,
            'estado' => $endereco->estado,
            'cep' => $endereco->cep,
            'logradouro' => $endereco->logradouro,
            'cidade' => $endereco->cidade
        );
        $this->db->where('id_pessoa', $this->id_pessoa);
        $this->db->update('pessoa', $pessoa);
        $this->db->where('id_endereco', $endereco->id_endereco);
        $this->db->update('endereco', $end);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
        } else {

            $this->db->trans_rollback();
        }
    }

    public function deletePessoaById($id) {
        $this->db->trans_begin();
        $this->db->where('pessoa_id', $id);
        $this->db->delete('endereco');
        $this->db->where('pessoa_id', $id);
        $this->db->delete('processo');
        $this->db->where('id_pessoa', $id);
        $this->db->delete('pessoa');

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
        } else {

            $this->db->trans_rollback();
        }
    }

    public function getPessoaByLike($param) {

        $this->db->select("pessoa.*", FALSE);
        $this->db->select("endereco.bairro", FALSE);
        $this->db->select("endereco.id_endereco", FALSE);
        $this->db->select("endereco.estado", FALSE);
        $this->db->select("endereco.cep", FALSE);
        $this->db->select("endereco.logradouro", FALSE);
        $this->db->select("endereco.cidade", FALSE);
        $this->db->select("estados.nome_uf", FALSE);
        $this->db->select("estados.id_estado", FALSE);
        $this->db->from('pessoa');
        $this->db->like($param['atributo'], $param['valor']);
        $this->db->join('endereco', 'endereco.pessoa_id = pessoa.id_pessoa');
        $this->db->join('estados', 'estados.id_estado = endereco.estado');
        $this->db->limit($param['maximo'], $param['inicio']);
        $query = $this->db->get();
        return $query->result_object();
    }

   
}
