

<div class="container">
    <div class="row">


        <div class="col-md-12">
            <h4>Sistema de Controle de Processo</h4>

            <div class="table-responsive">

              
                    <?php echo form_open('listaProcesso/pesquisaProcesso','class="navbar-form"'); ?>
                    <div class="input-group">
                        <input type="text" size="30" required class="form-control" placeholder="Nome ou Número do Processo" name="pesquisa">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
                <table id="mytable" class="table table-bordered table-hover"  style="font-size: 13px;text-align: center">

                    <thead >

                    <th style="text-align: center">Código</th>
                    <th style="text-align: center">Número Processo</th>
                    <th style="text-align: center">Nome Titular</th>
                    <th style="text-align: center">Tipo Processo</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Exibir</th>
                    <th style="text-align: center">Deletar</th>
                    <input type="hidden" id="ordem" class="ordem" name="ordem"/>
                    </thead>
                    <tbody>

                        <?php if (empty($processos)) { ?>

                        <td style="text-align: center ;color: red" colspan="7">Não existem processos para serem exibidos.</td>

                    <?php } else { ?>



                        <?php foreach ($processos as $processo) : ?>

                            <tr>
                                <td><?= $processo->id_processo ?></td>
                                <td><?= $processo->numero_processo ?></td>
                                <td><?= $processo->nome ?></td>
                                <td><?= $processo->nome_tipo_processo ?></td>
                                <td><?= $processo->email ?></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Exibir"><button onclick="janelaExibirProcesso(<?= $processo->id_processo ?>)" class="btn btn-primary btn-xs" data-title="Exibir" data-toggle="modal" data-target="#exibir" ><span class="glyphicon glyphicon-folder-open"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Deletar"><button  onclick="janelaExcluir(<?= $processo->id_processo ?>)" class="btn btn-danger btn-xs" data-title="Excluir" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </tr>   


                        <?php endforeach ?>

                    <?php } ?>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exibir" tabindex="-1" role="dialog" aria-labelledby="exibir" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Exibir Processo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post"  id="form_processo">

                    <div class="form-group">
                        <label for="numero_processo">Número Processo</label>
                        <input class="form-control " readonly id="numero_processo" type="text" placeholder="Número Processo">
                        <input class="form-control"   id="id_processo" type="hidden" >
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" readonly id="nome" type="text"  placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="nome_tipo_processo">Tipo Processo </label>
                        <input class="form-control " readonly id="nome_tipo_processo" type="text"  placeholder="Tipo Processo">

                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control " readonly id="email" type="text"  placeholder="Tipo Processo">

                    </div>
                    <div class="form-group">
                        <label for="datainicio">Data Inicio</label>
                        <input class="form-control " readonly id="datainicio" type="text"  placeholder="Tipo Processo">

                    </div>

                </form>
            </div>
            <div class="modal-footer ">

            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Deletar Processo</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('ListaProcesso/deleteProcesso'); ?>
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Deseja excluir o processo selecionado?</div>
                <div class="form-group">
                    <input class="form-control id_processo" name="id_processo" id="id_processo" type="hidden"  />
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Não</button>
                </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<script type="text/javascript">


    function carregaDadosClienteJSon(id_processo, tipo) {

        //alert(id_processo);
        var id = id_processo;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/listaProcesso/getProcessoJsonByid",
            data: {param: id},
            success: function (res) {
                var result = $.parseJSON(res);
                if (tipo === 'exibir') {
                    $('#numero_processo').val(result.numero_processo);
                    $('#nome').val(result.nome);
                    $('#id_processo').val(result.id_processo);
                    $('#nome_tipo_processo').val(result.nome_tipo_processo);
                    $('#email').val(result.email);
                    $('#datainicio').val(result.data_inicio);
                } else {

                    $('.id_processo').val(result.id_processo);


                }


            }

        });
    }

    function janelaExibirProcesso(id_processo) {

        carregaDadosClienteJSon(id_processo, 'exibir');

    }

    function janelaExcluir(id_processo) {

        carregaDadosClienteJSon(id_processo, 'excluir');

    }



</script>
