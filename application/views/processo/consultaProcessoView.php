


 <?php echo form_open('/alterarProcesso','class="form-horizontal"'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#consultar").click(function (event) {
                event.preventDefault();
                var nump = $("#numero").val();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/processo/consulta",
                    // dataType: 'json', 
                    data: {numero: nump},
                    // beforeSend: function () {
                    // $('#carregando').show();
                    // },

                    success: function (res) {
                        //$('#carregando').hide();
                        var result = $.parseJSON(res);
                        // alert(success);
                        if (result.erro) {
                            $('#erro').html("<div style='text-align: center' class = 'alert alert-danger'>"
                                    + result.erro + "</div>");
                            $('#tabela').hide();

                        } else {
                            //$('#resBusca').html('<p>' + res + '</p>');
                            $('#tabela').show();
                            var status = (result.status_processo === '1') ? 'Julgado' : 'Em andamento';
                            // $('#dados').html('<tr><td>' + result.nome + '</td><td>' + result.numero_processo + '</td><td>'
                            //    + result.data_inicio + '</td><td>' + result.nome_tipo_processo + '</td><td>' + status + '</td></tr>');
                            $('#nome').html(result.nome);
                            $('#numero_processo').html(result.numero_processo);
                            $('#datainicio').html(result.data_inicio);
                            $('#tipoprocesso').html(result.nome_tipo_processo);
                            $('#status_processo').html(status);
                            $('#id_processo').val(result.id_processo);
                            $('#erro').html('');
                        }
                    }


                    //error: function (data) {
                    //$('#carregando').html(data);
                    // $('#resBusca').html('<p>' teste '</p>');


                    // }



                });
            });
        });




    </script>

    <fieldset style="margin-top: 40px" >
        <?php echo validation_errors("<div style='text-align: center' class = 'alert-danger'><strong> ", "</strong></div>") ?>
        <br/>
        <!-- Form Name -->
        <div id="erro"></div>

        <!--Aqui é onde vai aparecer o resultado da busca-->


        <div class="form-group" style="display:inline" >
            <legend style="text-align: center;font-weight: bold">Consulta Processo</legend>

            <label class="col-md-4 control-label" for="numero">Número do Processo:</label>
            <div class="col-md-5">
                <input  id="numero" name="numero" value="<?php echo set_value('numero', ""); ?>" required ="required"  minlength="12"  maxlength="12" type="text" placeholder="Número Processo" class="form-control input-md num " />
                <input   type="hidden" name="acao" value="pesquisar"  />
                <div id="resBusca"></div>

            </div>
        </div> 

        <table class="table table-bordered"  id="tabela" style="display: none" >
            <thead>
                <tr>
                    <th style="text-align: center" >Nome</th>
                    <th style="text-align: center">Número Processo</th>
                    <th style="text-align: center">Data Inicio</th>
                    <th style="text-align: center">Tipo Processo</th>
                    <th style="text-align: center">Status Processo</th>
                    <th style="text-align: center">Editar</th>
                </tr>
            </thead>
            <tbody id="dados" style="text-align: center">

                <tr>
                    <td id="nome">


                    </td>
                    <td id="numero_processo">


                    </td>
                    <td id="datainicio">


                    </td>
                    <td id="tipoprocesso">


                    </td>
                    <td id="status_processo">


                    </td>

                
            <input type="hidden" name="id_processo" value="" id="id_processo"/>
            <td><p data-placement="top" data-toggle="tooltip" title="Editar"><button  type="submit"  class="btn btn-primary btn-xs" data-title="Editar" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

         

            </tr>


            </tbody>
        </table>



        <hr/>

        <!-- Select Basic -->

        <!-- Button (Double) -->
        <div class="form-group" >
            <label class="col-md-5 control-label" for="button1id"></label>
            <div class="col-md-7">
                <button id="consultar" type="button" name="salvar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Buscar</button>
                <a href="<?= site_url('/') ?>" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-share-alt"></span> Sair</a>
            </div>
        </div>
    </fieldset>
</form>








