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
          <select class="form-control ano" id="ano">
            <option> </option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-2">
          <label>Status</label>
        </div>

        <div class="col-sm-2">
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
        <div class="col-sm-12">
          <button id="filtrar" type='button' class="btn btn-success btn pull-right" style="margin-top:20px;">Filtrar</button>
        </div>
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
      <form action="<?php base_url(); ?>relatorio/coordenador" method="post" id="relatorio">

        <div class="row text-center" style="padding: 0 0 10px 0">
          <span class=" col-sm-3 text-center"><b> Aptos: <?php echo $resumo->pronto ?></b></span> 
          <span class=" col-sm-3 text-center"><b> Em Espera: <?php echo $resumo->espera ?></b></span>
          <span class=" col-sm-3 text-center"><b> Em Análise: <?php echo $resumo->analise ?></b></span>
          <span class=" col-sm-3 text-center"><b> Necessita Correção: <?php echo $resumo->correcao ?></b></span>
        </div>

        <input type="hidden" name="curso" value="<?php echo $coordenadorCurso; ?>">

        <div class="form-group">
          <div class="col-sm-2">
            <label>Ano</label>
          </div>

          <div class="col-sm-2">
            <select class="form-control ano" name="ano" id="relatorioAno">
              <option> </option>
            </select>
          </div>

          <div class="col-sm-2">
            <label>Semestre</label>
          </div>

          <div class="col-sm-2">
            <div class="col-sm-offset-1">
              <select id="relatorioSemestre" name="semestre" class="form-control">
                <option> </option> 
                <option value="1"> 1º Semestre </option>
                <option value="2"> 2º Semestre </option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <button type='button' class="btn btn-dropbox btn pull-right" onclick='$("#relatorio").submit()'><i class="glyphicon glyphicon-list-alt"></i> | Gerar Relatório</button>
          </div>
        </div>
      </form>

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
  });
</script>