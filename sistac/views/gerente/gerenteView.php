
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"><b> <?php echo $aluno->nome ?> </b></span>
        </div>
        <div class="panel-body">

            <div class="col-sm-12 text-left">
                <?php
                switch ($resumo->id) {
                    case 1:
                        echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-check"> </span>' . $resumo->aviso . '</div>';
                        break;
                    case 2:
                        echo '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"> </span>' . $resumo->aviso . '</div>';
                        break;
                    case 3:
                        echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-warning-sign"> </span>' . $resumo->aviso . '</div>';
                        break;
                }
                ?>
            </div>

            <div class="row" style="padding: 10px">
                <span class="glyphicon glyphicon-search col-sm-4 text-center"><b> Pesquisa <?php echo $resumo->pesquisa ?>/100</b></span> 
                <span class="glyphicon glyphicon-pencil col-sm-4 text-center"> <b>Ensino <?php echo $resumo->ensino ?>/100</b></span>
                <span class="glyphicon glyphicon-fullscreen col-sm-4 text-center"><b> Extensão <?php echo $resumo->extensao ?>/100</b></span>
            </div>

            <div class="form-group row col-sm-12" style="padding: 20px">
                <div class="col-sm-2">
                    <label>Status do pedido</label>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-offset-1">
                        <select id="status" class="form-control" >
                            <option> </option> 
                            <?php foreach ($status as $st) { ?>
                                <option value="<?php echo $st->id ?>"> <?php echo $st->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success col-md-2 pull-right" onclick="alterarStatus()">Alterar Status</button>
            </div>
            <div class="row"></div>
            <div class="form-group row col-sm-12">
                <button class="btn btn-primary col-sm-2  pull-right">Notificar Aluno</button>
            </div>

        </div>
    </div>

    <?php echo jTableStart('atividades', 'Lista de Atividades', '../listaAtividades/' . $pedidoId, '', '', '', array('selecting', 'paging', 'sorting')) ?>
    <?php echo jPanelAddID(true, false, false, false) ?>
    <?php echo jPanelAddCampo('descricao', 'Descrição', '', '40%', true, false, true) ?>
    <?php echo jPanelAddCampo('categoria', 'Categoria', '', '5%', true, false, true) ?>
    <?php echo jPanelAddCampo('tipoAtividade', 'Tipo Atividade', '', '30%', true, false, true) ?>
    <?php echo jPanelAddCampo('horas', 'Horas', '', '3%', true, false, true) ?>
    <?php echo jPanelAddCampo('aproveitamento', 'Apr. Horas', '', '10%', true, false, true) ?>
    <?php echo jPanelAddCampo('validaAtividade', 'Atividade ok?', '', '15%', true, false, true) ?>
    <?php echo jTableEnd() ?>

    <br>

    <!-- 
    
        FORMULÁRIO EDIÇÃO DE ATIVIDADE
    ==============================================================
    --> 

    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Editar Atividade</b>
        </div>
        <div class="panel-body">
            <form id="formEditarAtividade">
                <input type="hidden" class="form-control" id="id" value="">
                <input type="hidden" class="form-control" id="pedidoId" value="<?php echo $pedidoId; ?>">
                <input type="hidden" class="form-control" id="aproveitamento" value="">
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" value="">
                    </div>
                </div>

                <div class="form-group" style="padding-top:10px">
                    <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-3">
                        <select id="categoria" class='form-control' value="">
                            <option></option>
                            <?php
                            foreach ($categorias as $categoria)
                                echo '<option value=' . $categoria->id . '>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                            ?>    
                        </select>
                    </div>

                    <label for="tipoAtividade" class="col-sm-2 control-label">Tipo Atividade</label>
                    <div class="col-sm-5">
                        <select id="tipoAtividade" class='form-control'>
                            <option></option>
                            <?php
                            foreach ($tipoAtividades as $tipoAtividade)
                                echo '<option value=' . $tipoAtividade->id . '>' . $tipoAtividade->nome . '</option>';
                            ?>    
                        </select>
                    </div>

                    <label for="validaAtividade" class="col-sm-2 control-label">Atividade Ok?</label>
                    <div class="col-sm-3">
                        <select id="validaAtividade" class='form-control'>
                            <option></option>
                            <option value="Não"> Não</option>
                            <option value="Sim"> Sim</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unidade" class="col-sm-2 control-label"> Unidade <?php /* echo @$unidade->nome */ ?></label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="unidadeAtividade" placeholder="">
                    </div>
                </div>
                <div class="form-group" style="padding-top:10px">
                    <label for="certificado" class="col-sm-2 control-label">Certificado</label>
                    <div class="col-sm-3">
                        <?php
                        if (@$atividade->arquivoURL != NULL) {
                            echo '<button type="button" class="btn btn-primary" id="certificado" placeholder="">Visualizar</button>';
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-success pull-right" onclick="salvar()">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
    <div class="modal fade" id="sucesso" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                   
                    <div class="modal-body">
                        <b><h4>Registro salvo com sucesso!</h4></b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresh()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="falha" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <b><h4>Ocorreu uma falha tente novamente!</h4></b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresh()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        window.onload = function() {
            var statusId = "<?php echo $aluno->codStatus; ?>";
            $('#status').val(statusId).change();
        };

        function refresh() {
            location.reload();
        }

        function alterarStatus() {
            $.post('../alterarStatus',
                    {
                        status: $('#status').val(),
                        pedidoId: $('#pedidoId').val()
                    },
            function(data) {
                if (data == 'sucesso') {
                    $('#sucesso').modal('show');
                } else {
                    $('#falha').modal('show');
                }

            });
        }

        function getOnClick($value) {
            console.log($value);
            document.getElementById("id").value = $value.id;
            document.getElementById("pedidoId").value = $value.pedidoId;
            document.getElementById("descricao").value = $value.descricao;
            document.getElementById("unidadeAtividade").value = $value.horas;
            document.getElementById("aproveitamento").value = $value.aproveitamento;    
            $('#categoria').val($value.categoriaId).change();
            $('#tipoAtividade').val($value.tipoAtividadeId).change();
            $('#validaAtividade').val($value.validaAtividade).change();  
        }

        function salvar() {
            $.post('../salvar',
                    {
                        id: $('#id').val(),
                        pedidoId: $('#pedidoId').val(),
                        descricao: $('#descricao').val(),
                        categoria: $('#categoria').val(),
                        tipoAtividade: $('#tipoAtividade').val(),
                        unidade: $('#unidadeAtividade').val(),
                        validaAtividade: $('#validaAtividade').val(),
                        aproveitamento: $('#aproveitamento').val()
                    },
            function(data) {
                if (data == 'sucesso') {
                    $('#sucesso').modal('show');
                } else {
                    $('#falha').modal('show');
                }
            });


        }
    </script>