<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h1 class="text-center">Login</h1>
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
                           <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>  
                    </div>
                    <div class="modal-body">      
                            <?php echo form_open('Login/verificarUser','class="form col-md-12 center-block"'); ?>
                                    
                            <div class="form-group">
                                <input type="text" name="email" required class="form-control input-lg" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" required class="form-control input-lg" placeholder="Senha">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Acessar</button>
                              
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                           
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>  
    </body>
</html>