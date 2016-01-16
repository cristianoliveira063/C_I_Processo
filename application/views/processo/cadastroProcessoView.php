
<?php echo form_open('Processo/adicionaProcesso', 'class="form-horizontal"'); ?>

<fieldset >
    <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
    <br/>
    <!-- Form Name -->
    <legend style="text-align: center">Cadastro Processo</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome:</label>
        <div class="col-md-5">
            <input id="nome" name="nome" readonly="true" value="<?php echo set_value('nome', $pessoa->nome); ?>"  type="text"  class="form-control input-md" >

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="numero">CPF:</label>
        <div class="col-md-5">
            <input  id="cpf" name="cpf" readonly="true"     value="<?php echo set_value('cpf', $pessoa->cpf); ?>" required="required"   type="text"  class="form-control input-md " >

        </div>
    </div> 

    <div class="form-group">
        <label class="col-md-4 control-label" for="numero">Número Processo:</label>
        <div class="col-md-5">
            <input  id="numero" name="numero" value="<?php echo set_value('numero', ""); ?>" required="required" minlength="12"   maxlength="12" type="text"  class="form-control input-md num " />

        </div>
    </div> 

    <div class="form-group" >
        <label class="col-md-4 control-label" for="datainicio">Data Inicio Processo :</label>
        <div class="col-md-5">
            <input  id="datepicker" name="datainicio"  value="<?php echo set_value('datainicio', ""); ?>" required="required"  type="text" placeholder="Data Inicio Processo" class="form-control input-md data  " >

        </div>
    </div>



    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="tipoprocesso">Tipo Processo:</label>
        <div class="col-md-5">
            <select id="tipoprocesso" required="required" name="tipoprocesso"  class="form-control">
                <option value="" >Tipo Processo</option>

                <?php foreach ($tipo as $tipos) : ?>


                    <option value="<?= $tipos->id_tipo_processo ?>"> <?= $tipos->nome_tipo_processo ?>  </option>


                <?php endforeach ?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Status Processo:</label>
        <div class="col-md-5"> 
            <label class="radio-inline" for="radios-0">  
                <input type="radio" id="andamento" name="status" id="radios-0" value="2" checked="checked">
                Em andamento
            </label> 
            <label class="radio-inline" for="radios-1">
                <input type="radio" id="julgado" name="status" id="radios-1" value="1">
                Julgado
            </label> 

        </div>
    </div>

    <div id="campodatafim" class="form-group" style="display: none">
        <label class="col-md-4 control-label" for="dataencerramento">Data Fim do Processo :</label>
        <div class="col-md-5">
            <input   name="dataencerramento"  value=""  type="text"  class="form-control input-md data  " >

        </div>
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="descricao">Descrição:</label>
        <div class="col-md-5">

            <textarea id="descricao" minlength="10"  name="descricao" class = "form-control" rows = "3"></textarea>

        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group" >
        <label class="col-md-5 control-label" for="button1id"></label>
        <div class="col-md-7">
            <button id="salvar" type="submit" name="salvar" class="btn btn-success">Cadastrar</button>
            <input id="cancelar" type="reset" value="Limpar" name="cancelar" class="btn btn-danger"/>
        </div>
    </div>
</fieldset>
<script type="text/javascript">

    $(document).ready(function () {

        $(".data").mask("99/99/9999");
        $(document).ready(function () {
            $("#julgado").click(function () {
                 $('#campodatafim').show();
                //var t =  $('input[id="status2"]').val();
              

            });
            
             $("#andamento").click(function () {
                 $('#campodatafim').hide();
                //var t =  $('input[id="status2"]').val();
              

            });
        });





    });



</script>
</form>
