<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoProcessoModel
 *
 * @author 016255421
 */
class TipoProcessoModel extends CI_Model {
    
    public $id_tipo_processo;
    public $nome_tipo_processo;


    public function __construct() {
        parent::__construct();
    }
    
    
    
    public function selectTipoProcesso(){
        
        $query = $this->db->get('tipo_processo');
        return  $query->result();     
        
    }
    
    
    
}
