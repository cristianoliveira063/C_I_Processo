
<?php echo form_open('Pessoa/adicionarPessoa', 'class="form-horizontal"'); ?>

<fieldset  style="margin-top: 40px">
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center">Cadastro de pessoa</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome:</label>
        <div class="col-md-5">
            <input id="nome" name="nome" value="<?php echo set_value('nome', ""); ?>" required="required" type="text" placeholder="Informe seu nome" class="form-control input-md" >

        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="cpf">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" value="<?php echo set_value('cpf', ""); ?>" required="required"  maxlength="11" type="text" placeholder="Digite seu CPF" class="form-control input-md cpf num" >

        </div>
    </div> 
    <div class="form-group">
        <label class="col-md-4 control-label" for="nascimento">Data Nascimento:</label>
        <div class="col-md-5">
            <input  id="datepicker" required="required" name="nascimento" value="<?php echo set_value('nascimento', ""); ?>"  type="text" placeholder="dd/mm/yyyy" class="form-control input-md nascimento " >

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="fone">Fone:</label>
        <div class="col-md-5">
            <input  id="fone" name="fone" value="<?php echo set_value('fone', ""); ?>" required="required" maxlength="12" type="text" placeholder="DDD+Fone" class="form-control input-md fone num" >

        </div>
    </div>
    
     <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email:</label>
        <div class="col-md-5">
            <input  id="fone" name="email" value="<?php echo set_value('email', ""); ?>" required="required"   type="text"  placeholder="Email" class="form-control input-md fone" >

        </div>
    </div>
    <hr/>

    <div class="form-group">
        <label class="col-md-4 control-label" for="bairro">Bairro:</label>
        <div class="col-md-5">
            <input  id="bairro" name="bairro"  value="<?php echo set_value('bairro', ""); ?>" required="required"  type="text" placeholder="Bairro" class="form-control input-md  " >

        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">UF:</label>
        <div class="col-md-5">
            <select id="selectbasic" required="required" name="estado"  class="form-control">
                <option value="" >Selecione seu estado</option>
                
                <?php foreach ($estados as $estado) : ?>

                <option value="<?= $estado->id_estado ?>" <?=($estado->id_estado == set_value('estado', ""))?'selected':''?>> <?= $estado->nome ?>  </option>

                <?php endforeach ?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="cidade">Cidade:</label>
        <div class="col-md-5">
            <input  id="cidade" value="<?php echo set_value('cidade', ""); ?>" required="required" name="cidade"  type="text" placeholder="Cidade" class="form-control input-md  " >

        </div>
    </div>     
    <div class="form-group">
        <label class="col-md-4 control-label" for="cep">CEP:</label>
        <div class="col-md-5">
            <input  id="cep"  autocomplete="false" required="required" name="cep" value="<?php echo set_value('cep', ""); ?>"  type="text" placeholder="CEP" maxlength="8" class="form-control input-md num  ">

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="logradouro">Logradouro:</label>
        <div class="col-md-5">
            <input  id="logradouro" autocomplete="false"  required="required" value="<?php echo set_value('logradouro', ""); ?>" name="logradouro" type="text" placeholder="Rua,Quadra,Número" class="form-control input-md ">

        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group" >
        <label class="col-md-5 control-label" for="button1id"></label>
        <div class="col-md-7">
            <input id="salvar" type="submit" name="salvar" class="btn btn-success" value="Cadastrar"/>
            <input id="limpar" name="limpar" type="reset" class="btn btn-danger" value="Limpar"/>
        </div>
    </div>
</fieldset>
<script type="text/javascript">

    $(document).ready(function () {

    
        $(".nascimento").mask("99/99/9999");
        //$(".fone").mask("(99) 9999-9999");



    });

   


</script>
</form>
