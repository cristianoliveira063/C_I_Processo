
<?php echo form_open('alterarProcesso/editar', 'class="form-horizontal"'); ?>

<fieldset >
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center">Editar Processo</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome:</label>
        <div class="col-md-5">
            <input id="nome" name="nome" readonly="true" value="<?= $processo->nome ?>"  type="text"  class="form-control input-md" >
            <input id="id_processo" name="id_processo" type="hidden" value="<?= $processo->id_processo ?>"/>

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="numero">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" readonly="true"     value="<?= $processo->cpf ?>" required="required"   type="text"  class="form-control input-md " >

        </div>
    </div> 

    <div class="form-group">
        <label class="col-md-4 control-label" for="numero">Número Processo:</label>
        <div class="col-md-5">
            <input  id="numero" name="numero" value="<?= $processo->numero_processo ?>" readonly required="required" minlength="12"   maxlength="12" type="text"  class="form-control input-md num " />

        </div>
    </div> 

    <div class="form-group" >
        <label class="col-md-4 control-label" for="datainicio">Data Inicio Processo :</label>
        <div class="col-md-5">
            <input  id="datepicker" name="datainicio"  value="<?= dataMysqlParaPtBr($processo->data_inicio) ?>"  readonly  required="required"  type="text" placeholder="Data Inicio Processo" class="form-control input-md " >

        </div>
    </div>

    <!-- Select Basic -->

    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Status Processo:</label>
        <div class="col-md-5"> 
            <label class="radio-inline" for="radios-0">  
                <input type="radio" id="andamento" name="status" id="radios-0" value="2"  <?= $processo->status_processo == '2' ? 'checked' : '' ?>   >
                Em andamento
            </label> 
            <label class="radio-inline" for="radios-1">
                <input type="radio" id="julgado" name="status" id="radios-1" value="1"  <?= $processo->status_processo == '1' ? 'checked' : '' ?>>
                Julgado
            </label> 

        </div>
    </div>

    <div id="campodatafim" class="form-group" style="display: none">
        <label class="col-md-4 control-label" for="dataencerramento">Data Fim do Processo :</label>
        <div class="col-md-5">
            <input id="dataencerramento"  name="dataencerramento"  value="<?= dataMysqlParaPtBr($processo->data_encerramento) ?>"  type="text"  class="form-control input-md data  " >

        </div>
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="descricao">Descrição:</label>
        <div class="col-md-5">

            <textarea id="descricao"  rows="3" minlength="10"  name="descricao" class = "form-control" ><?=$processo->descricao ?></textarea>

        </div>
    </div>
    
    

    <!-- Button (Double) -->
    <div class="form-group" >
        <label class="col-md-5 control-label" for="button1id"></label>
        <div class="col-md-7">
            <button id="salvar" type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
            <a href="<?= site_url('/processo/abrirConsulta') ?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-share-alt"></span>Voltar</a>
        </div>
    </div>
</fieldset>
<script type="text/javascript">

    $(document).ready(function () {

        $(".data").mask("99/99/9999");
        $(document).ready(function () {

            var isChecked = jQuery("input[id='julgado']:checked").val();
            if (isChecked) {
                
                  $('#campodatafim').show();
            }


            $("#julgado").click(function () {
                $('#campodatafim').show();
             


            });

            $("#andamento").click(function () {
                $('#dataencerramento').val('');
                $('#campodatafim').hide();
               


            });
        });





    });



</script>
</form>
