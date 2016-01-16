<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of ListaProcesso
 *
 * @author 016255421
 */
class ListaProcesso extends MY_Controller {
   
   
    
    public function __construct() {
     
        
        parent::__construct();
        
    }
    
    
    
    public function index() {
       
        $this->load->template("processo/listaProcessoView");
        
        
    }
    
    
    
    
}
