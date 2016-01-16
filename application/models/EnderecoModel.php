<?php
/**
 * Description of EnderecoModel
 *
 * @author Cristiano
 */
class EnderecoModel extends CI_Model {
   
    
    public $bairro;
    public $estado;
    public $cidade;
    public  $cep;
    public $logradouro;
    public $pessoa_id;


    public function __construct() {
        parent::__construct();
    }
    
   
    public function  insertEndereco(){
        
       if($this->db->insert('endereco',$this)){
           
          
           return $this->db->insert_id();
           
       }
       
       return NULL;
        
        
    }
    
     public function insertPessoaComEndereco($pessoa) {
       
        $this->db->trans_begin();
        $this->db->insert('pessoa',$pessoa);
        $idPessoa = $this->db->insert_id();
        $this->pessoa_id = $idPessoa;
        $this->db->insert('endereco',$this);
        if($this->db->trans_status()=== FALSE){
            
            $this->db->trans_rollback();
            throw new Exception('Erro ao gravar Pessoa.');
            
        }else{
            
            $this->db->trans_commit();
                       
            
        }
        
      
    }
    
   
       
    
}
