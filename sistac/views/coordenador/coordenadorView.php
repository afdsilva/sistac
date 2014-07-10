<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Filtro de Alunos</h3>
    </div>
    <div class="panel-body">
        <form id="formFiltrar">

            <div class="form-group">
                <div class="col-sm-2">
                    <label>Ano</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="ano" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    <label>Status</label>
                </div>

                <div class="col-sm-6">
                    <div class="col-sm-offset-1">
                        <select id="status" class="form-control">
                            <option> </option> 
                            <?php foreach ($status as $st) { ?>
                                <option value="<?php echo $st->id ?>"> <?php echo $st->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="col-sm-2">
                    <label>Semestre</label>
                </div>

                <div class="col-sm-2">
                    <div class="col-sm-offset-1">
                        <select id="semestre" class="form-control">
                            <option> </option> 
                            <option value="1"> 1º Semestre </option>
                            <option value="2"> 2º Semestre </option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button id="filtrar" type='button' class="btn btn-success btn-lg pull-right">Filtrar</button>
            </div>
            <div class="form-group">
                <button type='button' class="btn btn-success btn-lg pull-right" onclick='gerarRelatorio()'>Gerar Relatório</button>
            </div>
        </form>        
    </div>
    
    
    <?php echo jTableStart('pedidos', 'Pedidos', 'coordenador/listaPedidos', '', '', '', array('selecting', 'multiselect', 'selectingCheckboxes')) ?>
        <?php echo jPanelAddID(true, false, false, false) ?>
        <?php echo jPanelAddCampo('nome', 'Nome', '', '30%', true, false, true) ?>
        <?php echo jPanelAddCampo('curso', 'Curso', '', '25%', true, false, true) ?>
        <?php echo jPanelAddCampo('anoSemestre', 'Ano/Semestre', '', '15%', true, false, true) ?>
        <?php echo jPanelAddCampo('status', 'Status', '', '25%', true, false, true) ?> 
    <?php echo jTableEnd() ?>
    
    

        
    <div id="teste" hidden="true">
        <button type="button" class="btn btn-primary btn-lg btn-block">visualizar aluno</button>
    </div>
    </section>
</div>

<script>
    
    function filtrar() {
        
        alert($('#status').val());
        
        var semestre = $('#semestre').val();
        var ano = $('#ano').val();
    }
    
    function gerarRelatorio(){
        // pega as linhas selecionadas
        var $selectedRows = $('#pedidos').jtable('selectedRows');
        
        //variavel record contem todos os dados da lista
        $selectedRows.each(function() {
                    var record = $(this).data('record');
                    console.log(record);
        });
    }

    function getOnClick($value) {
        
        var $selectedRows = $('#pedidos').jtable('selectedRows');
        console.log($selectedRows.length);
        switch ($selectedRows.length) {
            case 0:
                $('#teste').hide();
                break;
            case 1:
                $selectedRows.each(function() {
                    var record = $(this).data('record');
                    $('#teste').show();
                    
                });
                break;
            default:
                $('#teste').hide();
                break;
        }
    }
    

</script>