
<?php echo form_open('Pessoa/incluirProcesso', 'class="form-horizontal"'); ?>

<fieldset style="margin-top: 40px" >
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center;font-weight: bold">Cadastro Processo</legend>

  
    <div class="form-group" >
        <label class="col-md-4 control-label" for="cpf">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" value="<?php echo set_value('cpf', ""); ?>" required="required"  maxlength="11" type="text" placeholder="Digite seu CPF" class="form-control input-md cpf num" >
            <input name="pesquisar" id="pesquisar" type="hidden"/>   
        </div>
    </div> 
  

    <hr/>

    <!-- Select Basic -->
   
    <!-- Button (Double) -->
    <div class="form-group" >
        <label class="col-md-5 control-label" for="button1id"></label>
        <div class="col-md-7">
            <button id="salvar" type="submit" name="salvar" class="btn btn-success">Continuar</button>
            <button id="cancelar" name="cancelar" type="reset" class="btn btn-danger">Limpar</button>
        </div>
    </div>
</fieldset>
<script type="text/javascript">

    $(document).ready(function () {

    
   
     
    });



</script>
</form>
