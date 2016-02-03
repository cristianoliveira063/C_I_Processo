
<?php echo form_open('Usuario/adiciona','class="form-horizontal"'); ?>




<fieldset style="margin-top: 40px" >
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->

  <legend style="text-align: center" >Cadastro Usuário</legend>

    <!-- Text input-->
     <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome:</label>
        <div class="col-md-5">
            <input id="nome" name="nome" readonly="true" value="<?php echo set_value('nome',$pessoa->nome); ?>"  type="text"  class="form-control input-md" >
            <input type="hidden" name="id_pessoa" value="<?= $pessoa->id_pessoa?>"/>

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="numero">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" readonly="true"     value="<?php echo set_value('cpf',$pessoa->cpf); ?>" required="required"   type="text"  class="form-control input-md " >

        </div>
    </div> 
  
   
    <div class="form-group">
        <label class="col-md-4 control-label" for="senha">Senha:</label>
        <div class="col-md-5">
            <input  id="senha" name="senha"  required="required"  type="password" placeholder="Senha" class="form-control input-md" >

        </div>
    </div>
    
      <div class="form-group">
        <label class="col-md-4 control-label" for="rsenha">Repita sua senha:</label>
        <div class="col-md-5">
            <input  id="rsenha" name="rsenha"  required="required"  type="password" placeholder="Informe sua senha novamente" class="form-control input-md" >

        </div>
    </div>
    <hr/>

    <!-- Select Basic -->


    <!-- Button (Double) -->
        <div class="form-group" >
            <label class="col-md-5 control-label" for="button1id"></label>
            <div class="col-md-7">
                <button id="consultar" type="submit" name="salvar" class="btn btn-success"><span class="glyphicon glyphicon-user"></span>Cadastrar</button>
                <a href="<?= site_url('/') ?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-share-alt"></span> Sair</a>
            </div>
        </div>    
</fieldset>



<script type="text/javascript">
   



</script>
</form>
