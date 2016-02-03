

<div class="container">
    <div class="row">


        <div class="col-md-12">

            <h4>Sistema de Controle de Processo - Lista de Pessoas         
            </h4>


            <div class="table-responsive">


                <?php echo form_open('listaPessoa/pesquisar', 'class="navbar-form"'); ?>
                <div class="input-group">
                    <input type="text" size="30" class="form-control" placeholder="Nome ou CPF" name="pesquisa">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
                <table id="mytable" class="table table-bordered table-hover"  style="font-size: 13px;text-align: center">

                    <thead >

                    <th style="text-align: center">Código</th>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Data de Nascimento</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">CPF</th>
                    <th style="text-align: center">Telefone</th>
                    <th style="text-align: center">Exibir</th>
                    <th style="text-align: center">Atualizar</th>
                    <th style="text-align: center">Excluir</th>
                    <input type="hidden" id="ordem" class="ordem" name="ordem"/>
                    </thead>
                    <tbody>

                        <?php if (empty($pessoas)) { ?>

                        <td style="text-align: center ;color: red" colspan="7">Não existem registros para serem exibidos.</td>

                    <?php } else { ?>



                        <?php foreach ($pessoas as $pessoa) : ?>

                            <tr>
                                <td><?= $pessoa->id_pessoa ?></td>
                                <td><?= $pessoa->nome ?></td>
                                <td><?= dataMysqlParaPtBr($pessoa->data_nascimento) ?></td>
                                <td><?= $pessoa->email ?></td>
                                <td><?= $pessoa->cpf ?></td>
                                <td><?= $pessoa->telefone ?></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Exibir"><button onclick="janelaExibirPessoa(<?= $pessoa->id_pessoa ?>)" class="btn btn-primary btn-xs" data-title="Exibir" data-toggle="modal" data-target="#exibir" ><span class="glyphicon glyphicon-folder-open"></span></button></p></td>
                               <?php echo form_open('/alterarPessoa'); ?>
                                <input type="hidden" name="id_pessoa" value="<?= $pessoa->id_pessoa?>" id="id_pessoa"/>
                                <td><p data-placement="top" data-toggle="tooltip" title="Editar"><button  type="submit"  class="btn btn-primary btn-xs" data-title="Editar" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                
                            </form>
                               
                                <td><p data-placement="top" data-toggle="tooltip" title="Deletar"><button  onclick="janelaExcluir(<?= $pessoa->id_pessoa ?>)" class="btn btn-danger btn-xs" data-title="Excluir" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </tr>   


                        <?php endforeach ?>

                    <?php } ?>

                    </tbody>

                </table>



                <div class="clearfix"></div>

                <?php
                echo $paginacao;
                ?> 
                <!-- <ul class="pagination pull-right">
                     <li ><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                     <li class="active"><a href="#">1</a></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li><a href="#">4</a></li>
                     <li><a href="#">5</a></li>
                     <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                 </ul>-->

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exibir" tabindex="-1" role="dialog" aria-labelledby="exibir" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Dados Pessoa</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post"  id="form_processo" style="font-size: 11px">

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control " readonly id="nome" type="text" placeholder="Nome">
                        <input class="form-control"   id="id_pessoa" type="hidden" >
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Data de Nascimento:</label>
                        <input class="form-control" readonly id="data_nascimento" type="text"  placeholder="Nascimento">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control " readonly id="email" type="text"  placeholder="email">

                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input class="form-control " readonly id="cpf" type="text"  placeholder="CPF">

                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input class="form-control " readonly id="telefone" type="text"  placeholder="Telefone">

                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <input class="form-control " readonly id="bairro" type="text"  placeholder="Bairro">

                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input class="form-control " readonly id="cidade" type="text"  placeholder="Cidade">

                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input class="form-control " readonly id="estado" type="text"  placeholder="Estado">

                    </div>

                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input class="form-control " readonly id="cep" type="text"  placeholder="cep">

                    </div>

                    <div class="form-group">
                        <label for="logradouro">Logradouro:</label>
                        <input class="form-control " readonly id="logradouro" type="text"  placeholder="logradouro">

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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="excluir" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Deletar Pessoa</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('listaPessoa/delete'); ?>
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Deseja excluir a pessoa selecionada?</div>
                <div class="form-group">
                    <input class="form-control id_pessoa" name="id_pessoa" id="id_pessoa" type="hidden"  />
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Não</button>
                </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<script type="text/javascript">


    function carregaDadosPessoaJSon(id_pessoa, tipo) {

        //alert(id_processo);
        var id = id_pessoa;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/listaPessoa/getPessoaJsonId",
            data: {param: id},
            success: function (res) {
                var result = $.parseJSON(res);
                if (tipo === 'exibir') {
                    $('#nome').val(result.nome);
                    $('#id_pessoa').val(result.id_pessoa);
                    $('#data_nascimento').val(result.data_nascimento);
                    $('#email').val(result.email);
                    $('#cpf').val(result.cpf);
                    $('#email').val(result.email);
                    $('#telefone').val(result.telefone);
                    $('#bairro').val(result.bairro);
                    $('#cidade').val(result.cidade);
                    $('#estado').val(result.nome_uf);
                    $('#cep').val(result.cep);
                    $('#logradouro').val(result.logradouro);
                } else {

                    $('.id_pessoa').val(result.id_pessoa);
                     
                    


                }


            }

        });
    }

    function janelaExibirPessoa(id_pessoa) {

        carregaDadosPessoaJSon(id_pessoa, 'exibir');

    }

    function janelaExcluir(id_pessoa) {

        carregaDadosPessoaJSon(id_pessoa, 'excluir');

    }



</script>
