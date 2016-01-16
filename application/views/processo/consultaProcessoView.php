

<form id="formulario_cadastro" method="post" class="form-horizontal">

    <script type="text/javascript">

        $(document).ready(function () {
            $("#consultar").click(function (event) {
                event.preventDefault();
                var nump = $("#numero").val();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/processo/consultaProcesso",
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
                            $('#dados').html('<tr><td>' + result.nome + '</td><td>' + result.numero_processo + '</td><td>'
                                    + result.data_inicio + '</td><td>' + result.nome_tipo_processo + '</td><td>' + status + '</td></tr>');
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
                <input  id="numero" name="numero" value="<?php echo set_value('numero', ""); ?>" required  minlength="12"  maxlength="12" type="text" placeholder="Número Processo" class="form-control input-md num " />
                <input   type="hidden" name="acao" value="pesquisar"  />
                <div id="resBusca"></div>

            </div>
        </div> 

        <table class="table table-bordered" id="tabela" style="display: none">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Número Processo</th>
                    <th>Data Inicio</th>
                    <th>Tipo Processo</th>
                    <th>Status Processo</th>
                </tr>
            </thead>
            <tbody id="dados">



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

</form>






