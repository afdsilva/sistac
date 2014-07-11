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
            <div class="row"> </div>
            <div class="form-group">
                <button id="filtrar" type='button' class="btn btn-success btn pull-right">Filtrar</button>
                
            </div>
    </div>
</form>        
</div>

<br>

    <?php echo jTableStart('pedidos', 'Pedidos', 'coordenador/listaPedidos', '', '', '', array('selecting', 'multiselect', 'selectingCheckboxes')) ?>
        <?php echo jPanelAddID(true, false, false, false) ?>
        <?php echo jPanelAddCampo('nome', 'Nome', '', '30%', true, false, true) ?>
        <?php echo jPanelAddCampo('curso', 'Curso', '', '25%', true, false, true) ?>
        <?php echo jPanelAddCampo('anoSemestre', 'Ano/Semestre', '', '15%', true, false, true) ?>
        <?php echo jPanelAddCampo('status', 'Status', '', '25%', true, false, true) ?> 
    <?php echo jTableEnd() ?>



<br>
<div id="resumo" >

    <div class="panel panel-info">

        <div class="panel-heading">
            <h3 class="panel-title">Resumo</h3>
        </div>
        <div class="panel-body">
            
            <div class="row text-center" style="padding: 10px">
                <span class=" col-sm-3 text-center"><b> Aptos: <?php echo $resumo->pronto ?></b></span> 
                <span class=" col-sm-3 text-center"><b> Em Espera: <?php echo $resumo->espera ?></b></span>
                <span class=" col-sm-3 text-center"><b> Em Análise: <?php echo $resumo->analise ?></b></span>
                <span class=" col-sm-3 text-center"><b> Necessita Correção: <?php echo $resumo->correcao ?></b></span>
            </div>
            
            <form id="formFiltrar">
            <input type="hidden" class="form-control" id="coordenadorCurso" value="<?php echo $coordenadorCurso; ?>">
            <div class="form-group">
                <div class="col-sm-2">
                    <label>Ano</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="rptAno" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <label>Semestre</label>
                </div>

                <div class="col-sm-2">
                    <div class="col-sm-offset-1">
                        <select id="rptSemestre" class="form-control">
                            <option> </option> 
                            <option value="1"> 1º Semestre </option>
                            <option value="2"> 2º Semestre </option>
                        </select>
                    </div>
                </div>
            </div>
                
                
            
            <button type='button' class="btn btn-dropbox btn pull-right" onclick='gerarRelatorio()'><i class="glyphicon glyphicon-list-alt"></i> | Gerar Relatório</button>
            
           <!-- 
            <div id='visualizar'>
                <button class="btn btn-primary" onclick="visualizar()"> | Visualizar aluno</button>
            </div>
            <div id='aluno'>
                
                
                <h4><p><b><?php // $aluno->nome; ?></b></p></h4>
                <p><b> Curso: </b> <?php // $aluno->curso; ?></p>
                <p><b> Ano/Semestre: </b> <?php // $aluno->ano; ?>/ <?php  $aluno->semestre; ?></p>
                <p><b> Horas </b> <?php // $aluno->curso; ?></p>
                <hr>
                <p><b> Pesquisa: </b> <?php // $aluno->pesquisa; ?></p>
                <p><b> Ensino: </b> <?php // $aluno->ensino; ?></p>
                <p><b> Extensão: </b> <?php // $aluno->extensao; ?></p>
        
            </div> -->
        </div>

    </div>
</div>
<script>

    $('#filtrar').click(function() {
        $('#pedidos').jtable('load', {
            ano: $("#ano").val(),
            semestre: $("#semestre").val(),
            status: $("#status").val()
        });
    })

    function gerarRelatorio() {  
        var $selectedRows = $('#pedidos').jtable('selectedRows');
        var record = new Array()
        var i = 0;
        
        $selectedRows.each(function() {
            record[i] = $(this).data('record');
            console.log(record[i]);
            i++;    
        });
        
        $.post(<?php base_url(); ?>'relatorio/gerarRelatorio',
            { pedidos: record,
              size: i,
              ano:$("#rptAno").val(),
              semestre: $("#rptSemestre").val(),
              curso: $("#coordenadorCurso").val()
            },
            function(data) {
                if (data == 'sucesso') {   
                } else {
                }
            });
    }

</script>