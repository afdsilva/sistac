    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><b>Filtro de Alunos</b></h3>
      </div>

      <div class="panel-body">
        <form id="formFiltrar">
          <div class="form-group">
            <div class="col-sm-2">
              <label>Nome do Aluno</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nomeAluno" placeholder="">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-2">
              <label>Curso</label>
            </div>
            <div class="col-sm-4">
              <select id="curso" class="form-control">
                <option> </option> 
                <?php foreach ($cursos as $curso) { ?>
                <option value="<?php echo $curso->id ?>"> <?php echo $curso->id . " - " . $curso->nome ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-1">
              <label>Status</label>
            </div>

            <div class="col-sm-4">
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
              <label>Ano</label>
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="ano" placeholder="">
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
        </form>
      </div>
    </div>   



    <?php echo jTableStart('pedidos', 'Pedidos', 'gerente/listaPedidos', '', '', '', array('selecting', 'multiselect', 'selectingCheckboxes')) ?>
    <?php echo jPanelAddID(true, false, false, false) ?>
    <?php echo jPanelAddCampo('nome', 'Nome', '', '30%', true, false, true) ?>
    <?php echo jPanelAddCampo('curso', 'Curso', '', '25%', true, false, true) ?>
    <?php echo jPanelAddCampo('anoSemestre', 'Ano/Semestre', '', '15%', true, false, true) ?>
    <?php echo jPanelAddCampo('status', 'Status', '', '25%', true, false, true) ?> 
    <?php echo jTableEnd() ?>
    <script>
      $('#filtrar').click(function() {
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
            location.href = 'gerente/editar/' + record.id;
          });
          break;
          default:
          dialogBlogDialogoOpen('default', 'default');
          break;
        }

        containerSize();
      }

      function getOnClick($value) {
        location.href = 'gerente/editar/' + $value.id;
      }
      function remover() {


      }

    </script>