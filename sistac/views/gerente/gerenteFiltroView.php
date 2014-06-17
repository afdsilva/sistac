<ol class="breadcrumb">
  <li><b>Gerente</b></li>
  <li><a href="<?= base_url() ?>gerente">Filtro</a></li>

  
</ol>
<div class="row">
    <div class="container col-sm-8 col-md-offset-2">
        <div class="form-group well-sm">
            <form class="form-horizontal well" role="form">
                <h3><strong>Filtro</strong></h3>
                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nome do Aluno</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nomeAluno" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Curso</label>
                    <div class="col-sm-6">
                        <select id="curso" class="form-control">
                            <option> </option> 
                            <?php foreach ($cursos as $curso) { ?>
                                <option value="<?php echo $curso->id ?>"> <?php echo $curso->id . " - " . $curso->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                        <select id="status" class="form-control">
                            <option> </option> 
                            <?php foreach ($status as $st) { ?>
                                <option value="<?php echo $st->id ?>"> <?php echo $st->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Ano</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ano" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Semestre</label>
                    <div class="col-sm-3">
                        <select id="semestre" class="form-control">
                            <option> </option> 
                            <option value="1"> 1º Semestre </option>
                            <option value="2"> 2º Semestre </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button id="filtrar" type='button' class="btn btn-success btn-lg pull-right">Filtrar</button>
                </div>
                <div class="form-group">
                    <button type='button' class="btn btn-success btn-lg pull-right" onclick='editar()'>Editar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="container col-sm-8 col-md-offset-2">
            <?php echo jTableStart('pedidos', 'Pedidos', 'gerente/listaPedidos', '', '', '', array('selecting')) ?>
            <?php echo jPanelAddID(true, false, false, false) ?>
            <?php echo jPanelAddCampo('nome', 'Nome', '', '30%', true, false, true) ?>
            <?php echo jPanelAddCampo('curso', 'Curso', '', '25%', true, false, true) ?>
            <?php echo jPanelAddCampo('anoSemestre', 'Ano/Semestre', '', '15%', true, false, true) ?>
            <?php echo jPanelAddCampo('status', 'Status', '', '25%', true, false, true) ?>
            <?php echo jTableEnd() ?>
        </div>
    </div>

</div>

<script>
    

    $('#filtrar').click(function(){
        $('#pedidos ').jtable('load', {
                nomeAluno: $('#nomeAluno').val(),
                ano: $("#ano").val(),
                semestre: $("#semestre").val(),
                curso: $("#curso").val(),
                status: $("#status").val()
            });
    })

    function editar() {
        var $selectedRows = $('#pedidos').jtable('selectedRows');
        switch ($selectedRows.length) {
            case 0:
                dialogBlogDialogoOpen('nao tem ninguem selecionado', 'muitos selecionados');
                break;
            case 1:
                $selectedRows.each(function() {
                    var record = $(this).data('record');
                    console.log(record);
                    location.href = 'gerente/editar/'+record.id;
                });
                break;
            default:
                dialogBlogDialogoOpen('default', 'default');
                break;
        }
    }

    function getOnClick($value){
        location.href = 'gerente/editar/'+$value.id;   
    }
    function remover() {


    }

</script>