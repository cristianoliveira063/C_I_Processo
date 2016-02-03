<?php

/**
 * Description of EstadoModel
 *
 * @author Cristiano
 */
class EstadoModel extends CI_Model {
    
    
    public $codigoIbge;
    public  $sigla;
    public  $nome_uf;


    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    
    public function  SelectAllEstados(){
      $query = $this->db->get('estados');   
      return $query->result();   
    }
    
    
    
    
    
}
