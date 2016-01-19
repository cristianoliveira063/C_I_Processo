<?php

function removeMask($documento) {

    if (!empty($documento)) {

        $doc = preg_replace("/\D+/", "", $documento);

        return $doc;
    }

    return null;
}

function dataMysqlParaPtBr($dataMysql) {
    $data = new DateTime($dataMysql);
    return $data->format("d/m/Y");
}

function dataPtBrParaMysql($dataPtBr) {
    if (!empty($dataPtBr)) {

        $partes = explode("/", $dataPtBr);
        return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    }

    return null;
}

function ValidaData($dat) {
    $data = explode("/", "$dat"); // fatia a string $dat em pedados, usando / como referência
    $d = $data[0];
    $m = $data[1];
    $y = $data[2];

    // verifica se a data é válida!
    // 1 = true (válida)
    // 0 = false (inválida)
    $res = checkdate($m, $d, $y);
    if ($res == 1) {
        return true;
    } else {
        return false;
    }
    
     
}


 //var_dump(ctype_digit($variavel));
    // var_dump(strlen($variavel));

 function is_digito($param) {
    if(empty($param)){
        
        return false;
        
    }
       
     return ctype_digit($param); 
        
        
}

function nome_valido($valor){
    
  $padrao = "/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/";
  if(!empty($valor) && preg_match($padrao,$valor)){
      
      return TRUE;
      
  }
  
    return FALSE;
    
    
}



