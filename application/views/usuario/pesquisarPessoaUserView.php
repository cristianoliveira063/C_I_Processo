
<?php echo form_open('Usuario/pesquisaUser', 'class="form-horizontal"'); ?>

<fieldset style="margin-top: 40px" >
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center;font-weight: bold">Cadastro Usuario</legend>

  
    <div class="form-group" >
        <label class="col-md-4 control-label" for="cpf">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" value="<?php echo set_value('cpf', ""); ?>" maxlength="11" required type="text" placeholder="Digite seu CPF" class="form-control input-md  num" >
            
        </div>
    </div> 
  

    <hr/>

    <!-- Select Basic -->
   
    <!-- Button (Double) -->
       <!-- Button (Double) -->
        <div class="form-group" >
            <label class="col-md-5 control-label" for="button1id"></label>
            <div class="col-md-7">
                <button id="consultar" type="submit" name="salvar" class="btn btn-success"><span class="glyphicon glyphicon-user"></span>Buscar</button>
                <a href="<?= site_url('/') ?>" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-share-alt"></span> Sair</a>
            </div>
        </div>
</fieldset>
<script type="text/javascript">

    $(document).ready(function () {
 
    });



</script>
</form>
