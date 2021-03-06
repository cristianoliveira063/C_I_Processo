<!DOCTYPE html>
<html >
    <head>


        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
        <link href="<?php echo base_url(); ?>css/navbar-static-top.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.forms.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>   
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <script>
            $(function () {
                $(".data").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'});

            });


            $(function () {
                $('.num').bind('keydown', soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
            });



            function soNums(e) {

                //teclas adicionais permitidas (tab,delete,backspace,setas direita e esquerda)
                keyCodesPermitidos = new Array(8, 9, 37, 39, 46);

                //numeros e 0 a 9 do teclado alfanumerico
                for (x = 48; x <= 57; x++) {
                    keyCodesPermitidos.push(x);
                }

                //numeros e 0 a 9 do teclado numerico
                for (x = 96; x <= 105; x++) {
                    keyCodesPermitidos.push(x);
                }

                //Pega a tecla digitada
                keyCode = e.which;

                //Verifica se a tecla digitada é permitida
                if ($.inArray(keyCode, keyCodesPermitidos) != -1) {
                    return true;
                }
                return false;
            }



        </script>

        <title>Controle de Processos</title>

    </head>

    <body>

        <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Controle de Processos</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
              <li><a href="<?= site_url('/pessoa') ?>">Cadastro Pessoas</a></li>
               <li><a href="<?php echo site_url('pessoa/pesquisar') ?>">Cadastro Processo</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('/listaProcesso/') ?>">Lista de Processos</a></li>
                <li><a href="<?php echo site_url('/listaPessoa/') ?>">Lista de Pessoas</a></li>
                <li><a href="#">Controle Usuário</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Processo</li>
                <li><a href="<?= site_url('processo/abrirConsulta')?>">Fechar Processo</a></li>
                <li><a href="<?= site_url('processo/abrirConsulta')?>">Reabrir Processo</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?= site_url('processo/abrirConsulta')?>">Consulta Processo</a></li>
            <li ><a href="<?= site_url('/usuario/') ?>">Cadastro Usuário<span class="sr-only">(current)</span></a></li>
           <li class="active"><a href=""  data-toggle="modal" data-target="#sair" ><?= getSessionUser()== NULL ? 'Login' : 'Sair'?><span class="sr-only">(current)</span></a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


        <br/>
        <div class="container">

            <?php if ($this->session->flashdata("success")) : ?>

                <div  style="text-align: center"  class="alert alert-success  alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <?= $this->session->flashdata("success") ?> 
                </div>                       

            <?php endif ?>

            <?php if ($this->session->flashdata("danger")) : ?>
                <div  style="text-align: center"  class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <?= $this->session->flashdata("danger") ?> 
                </div>   

            <?php endif ?>
  


 