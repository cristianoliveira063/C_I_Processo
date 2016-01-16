<?php

 function autoriza() {
	$ci = get_instance();
	$usuarioLogado = $ci->session->userdata("usuario");
	if(!$usuarioLogado) {
		$ci->session->set_flashdata("danger", "Você precisa estar logado");
		redirect("/");
	}
	return $usuarioLogado;
}

function getSessionUser() {
    
    $ci = get_instance();
    $usuario = $ci->session->userdata("usuario");
    return  $usuario;
    
}


