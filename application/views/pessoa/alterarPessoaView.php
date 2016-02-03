
<?php echo form_open('alterarPessoa/alterar', 'class="form-horizontal"'); ?>

<fieldset  style="margin-top: 40px">
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center">Editar cadastro de pessoa</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome:</label>
        <div class="col-md-5">
            <input id="nome" name="nome" value="<?php echo set_value('nome', $pessoa->nome); ?>" required="required" type="text" placeholder="Informe seu nome" class="form-control input-md" >
            <input id="id_pessoa" type="hidden" name="id_pessoa" value="<?= $pessoa->id_pessoa?>"/>
            <input id="id_endereco" type="hidden" name="id_endereco" value="<?= $pessoa->id_endereco?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="cpf">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" readonly value="<?php echo set_value('cpf', $pessoa->cpf); ?>" required="required"  maxlength="11" type="text" placeholder="Digite seu CPF" class="form-control input-md cpf num" >

        </div>
    </div> 
    <div class="form-group">
        <label class="col-md-4 control-label" for="nascimento">Data Nascimento:</label>
        <div class="col-md-5">
            <input  id="datepicker" required="required" name="nascimento" value="<?php echo set_value('nascimento',dataMysqlParaPtBr($pessoa->data_nascimento)); ?>"  type="text" placeholder="dd/mm/yyyy" class="form-control input-md nascimento data " >

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="fone">Fone:</label>
        <div class="col-md-5">
            <input  id="fone" name="fone" value="<?php echo set_value('fone',$pessoa->telefone); ?>" required="required" maxlength="12" type="text" placeholder="DDD+Fone" class="form-control input-md fone num" >

        </div>
    </div>
    
     <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email:</label>
        <div class="col-md-5">
       <input  id="fone" name="email" readonly value="<?php echo set_value('email', $pessoa->email); ?>" required="required"   type="text"  placeholder="Email" class="form-control input-md fone" >

        </div>
    </div>
    <hr/>

    <div class="form-group">
        <label class="col-md-4 control-label" for="bairro">Bairro:</label>
        <div class="col-md-5">
            <input  id="bairro" name="bairro"  value="<?php echo set_value('bairro', $pessoa->bairro); ?>" required="required"  type="text" placeholder="Bairro" class="form-control input-md  " >

        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">UF:</label>
        <div class="col-md-5">
            <select id="selectbasic" required="required" name="estado"  class="form-control">
                <option value="" >Selecione seu estado</option>
                
                <?php foreach ($estados as $estado) : ?>

                <option value="<?= $estado->id_estado ?>" <?=($estado->id_estado == set_value('estado', $pessoa->id_estado))?'selected':''?>> <?= $estado->nome_uf ?>  </option>

                <?php endforeach ?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="cidade">Cidade:</label>
        <div class="col-md-5">
            <input  id="cidade" value="<?php echo set_value('cidade',$pessoa->cidade); ?>" required="required" name="cidade"  type="text" placeholder="Cidade" class="form-control input-md  " >

        </div>
    </div>     
    <div class="form-group">
        <label class="col-md-4 control-label" for="cep">CEP:</label>
        <div class="col-md-5">
            <input  id="cep"  autocomplete="false" required="required" name="cep" value="<?php echo set_value('cep',$pessoa->cep); ?>"  type="text" placeholder="CEP" maxlength="8" class="form-control input-md num  ">

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="logradouro">Logradouro:</label>
        <div class="col-md-5">
            <input  id="logradouro" autocomplete="false"  required="required" value="<?php echo set_value('logradouro', $pessoa->logradouro); ?>" name="logradouro" type="text" placeholder="Rua,Quadra,Número" class="form-control input-md ">

        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group" >
        <label class="col-md-5 control-label" for="button1id"></label>
        <div class="col-md-7">
            <input id="salvar" type="submit" name="alterar" class="btn btn-success" value="Alterar"/>
            <a href="<?= site_url('/listaPessoa/lista') ?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-share-alt"></span> Sair</a>
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
