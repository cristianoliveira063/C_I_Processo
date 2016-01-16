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
   


    public function __construct() {
        parent::__construct();
       
        
    }
    
    
    public function insertPessoa(){
        
      return $this->db->insert('pessoa',  $this);
     
    }
    
  
    public function getPessoaByCpf($cpf) {
        
       $query = $this->db->get_where('pessoa',array('cpf' => $cpf ));
       return $query->row_object();
    }
    
    
      public function getPessoaByEmail($email) {
       $query = $this->db->get_where('pessoa',array('email' => $email ));
       return $query->row_object();
    }
    
      public function getPessoaByCodigo($codigo) {
       $query = $this->db->get_where('pessoa',array('id_pessoa' => $codigo ));
       return $query->row_object();
    }
    
    
    public function  selectAllPessoa(){
      $query = $this->db->get('pessoa');   
      return $query->result_object();   
    }
    
  
}
