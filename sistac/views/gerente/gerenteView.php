

<div class="container col-md-12">
    <ol class="breadcrumb">
        <li><b>Gerente</b></li>
        <li><a href="<?= base_url() ?>gerente">Filtro</a></li>
        <li class="active">Editar</li>
        <li class="active"><?php echo $pedidoId; ?></li>

    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Resumo</b>
        </div>
        <div class="panel-body">
            <span class="glyphicon glyphicon-search col-sm-4 text-center"><b> Pesquisa 100/100</b></span> 
            <span class="glyphicon glyphicon-pencil col-sm-4 text-center"> <b>Ensino 100/100</b></span>
            <span class="glyphicon glyphicon-fullscreen col-sm-4 text-center"><b> Extensão 100/100</b></span>
        </div>
    </div>

    <?php echo jTableStart('atividades', 'Lista de Atividades', '../listaAtividades/' . $pedidoId, '', '', '', array('selecting', 'paging','sorting')) ?>
    <?php echo jPanelAddID(true, false, false, false) ?>
    <?php echo jPanelAddCampo('descricao', 'Descrição', '', '40%', true, false, true) ?>
    <?php echo jPanelAddCampo('categoria', 'Categoria', '', '5%', true, false, true) ?>
    <?php echo jPanelAddCampo('tipoAtividade', 'Tipo Atividade', '', '35%', true, false, true) ?>
    <?php echo jPanelAddCampo('horas', 'Horas', '', '3%', true, false, true) ?>
    <?php echo jPanelAddCampo('aproveitamento', 'Aproveitamento', '', '3%', true, false, true) ?>
    <?php echo jPanelAddCampo('unidade', 'Unidade', '', '3%', true, false, true) ?>
    <?php echo jPanelAddCampo('validaAtividade', 'Atividade ok?', '', '13%', true, false, true) ?>
    <?php echo jTableEnd() ?>
    
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Editar Atividade</b>
        </div>
        <div class="panel-body">
            <form id="formEditarAtividade">
                
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" value="<?= @$atividade->descricao ?>">
                    </div>
                </div>

                <div class="form-group" style="padding-top:10px">
                    <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-3">
                        <select id="categoria" class='form-control' value="<?= @$ativiade->categoria ?>">
                            <option></option>
                            <?php
                            foreach ($categorias as $categoria)
                                echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                            ?>    
                        </select>
                    </div>

                    <label for="tipoAtividade" class="col-sm-2 control-label">Tipo Atividade</label>
                    <div class="col-sm-5">
                        <select id="tipoAtividade" class='form-control'>
                            <option></option>
                            <?php
                            foreach ($tipoAtividades as $tipoAtividade)
                                echo '<option>' . $tipoAtividade->nome . '</option>';
                            ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unidade" class="col-sm-2 control-label"> Unidade <?php /* echo @$unidade->nome */ ?></label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="unidade" placeholder="">
                    </div>
                </div>
                <div class="form-group">
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
                        <button type="button" class="btn btn-success pull-right">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
<script>

    function getOnClick($value){
        console.log($value);
        document.getElementById("descricao").value = $value.descricao;
       // document.getElementById("categoria").value = $value.descricao;
       // document.getElementById("tipoAtividade").value = $value.descricao;
       // document.getElementById("unidade").value = $value.descricao;
        
    }


</script>