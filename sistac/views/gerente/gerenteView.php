


<ol class="breadcrumb">
  <li><b>Gerente</b></li>
  <li><a href="<?= base_url() ?>gerente">Filtro</a></li>
  <li class="active">Editar</li>
  <li class="active"><?php echo $pedidoId; ?></li>
  
</ol>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Resumo</h3>
    </div>
    <div class="panel-body">
        <span class="glyphicon glyphicon-search"></span><b> Pesquisa</b> 
         <span class="glyphicon glyphicon-pencil"></span> <b>Ensino </b>
         <span class="glyphicon glyphicon-fullscreen"></span><b> Extensão </b>
        
        
    </div>
</div>

<div class="row">
 
    
            <?php echo jTableStart('atividades', 'Lista de Atividades', '../listaAtividades/'.$pedidoId, '', '', '', array('selecting')) ?>
            <?php echo jPanelAddID(true, false, false, false) ?>
            <?php echo jPanelAddCampo('descricao', 'Descrição', '', '40%', true, false, true) ?>
            <?php echo jPanelAddCampo('categoria', 'Categoria', '', '5%', true, false, true) ?>
            <?php echo jPanelAddCampo('tipoAtividade', 'Tipo Atividade', '', '35%', true, false, true) ?>
            <?php echo jPanelAddCampo('horas', 'Horas', '', '3%', true, false, true) ?>
            <?php echo jPanelAddCampo('aproveitamento', 'Aproveitamento', '', '3%', true, false, true) ?>
            <?php echo jPanelAddCampo('unidade', 'Unidade', '', '3%', true, false, true) ?>
            <?php echo jPanelAddCampo('validaAtividade', 'Atividade ok?', '', '10%', true, false, true) ?>
            <?php echo jTableEnd() ?>
   
    </div>


<div class="row">
    <div class="container col-sm-8 col-md-offset-2">
        <h4> Edição</h4>
        <form class="form-horizontal well" role="form">
            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descricao" value="<?=@$atividade->descricao?>">
                </div>
            </div>

            <div class="form-group">
                <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-3">
                    <select id="categoria" class='form-control' value="<?=@$ativiade->categoria?>">
                        <option></option>
                        <?php
                        foreach ($categorias as $categoria)
                            echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                        ?>    
                    </select>
                </div>

                <label for="tipoAtividade" class="col-sm-2 control-label">Tipo Atividade</label>
                <div class="col-sm-5">
                    <select id="tipoAtividade" class='form-control '>
                        <option></option>
                        <?php
                        foreach ($tipoAtividades as $tipoAtividade)
                            echo '<option>' . $tipoAtividade->nome . '</option>';
                        ?>    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="unidade" class="col-sm-2 control-label"> Unidade <?php /* echo @$unidade->nome */?></label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="unidade" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="certificado" class="col-sm-2 control-label">Certificado</label>
                <div class="col-sm-3">
                    <?php
                    //if ($atividade->arquivoURL != NULL) {
                        echo '<button type="button" class="btn btn-primary" id="certificado" placeholder="">Visualizar</button>';
                    //}
                    ?>
                </div>
            </div>
            <hr>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success">Salvar</button>
        </div>
    </div>
    </div>

</div>



<div class="row">
</div>

<script>
</script>