
    <div class="form-group">
            <div class="form-group">
                <form action="<?= base_url() ?>administrador/cadastrar" class="well" method="POST">
                    <input type="submit" value="Novo Usuário" class="btn btn-primary">
                </form>
            </div> 
        <form class="form-horizontal well" role="form">
            <h3><strong>Filtro</strong></h3>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nomeUsuario" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Usuário</label>
                <div class="col-sm-3">
                    <select id="tipoUsuario" class="form-control">
                        <option> </option>
                        <?php foreach ($tipoUsuario as $tu) { ?>
                        <option value="<?php echo $tu->id ?>"> <?php echo $tu->descricao ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button id="filtrar" type='button' class="btn btn-success btn-lg pull-right">Filtrar</button>
            </div>
        </form>
    </div>
    
     <?php echo jTableStart('usuarios', 'Lista Usuarios', 'administrador/listaUsuarios', '', '', '', array('selecting', 'multiselect', 'selectingCheckboxes')) ?>
    <?php echo jPanelAddID(true, false, false, false) ?>
    <?php echo jPanelAddCampo('nome', 'Nome', '', '30%', true, false, true) ?>
    <?php echo jPanelAddCampo('email', 'Email', '', '25%', true, false, true) ?>
    <?php echo jPanelAddCampo('descricao', 'Tipo de Usuário', '', '15%', true, false, true) ?>
    <?php echo jTableEnd() ?>
    <script>
      $('#filtrar').click(function() {
        $('#usuarios ').jtable('load', {
          nomeUsuario: $('#nomeUsuario').val(),
          email: $("#email").val(),
          tipoUsuario: $("#tipoUsuario").val(),
        });
      })

      function editar() {
        var $selectedRows = $('#usuarios').jtable('selectedRows');
        switch ($selectedRows.length) {
          case 0:
          dialogBlogDialogoOpen('nao tem ninguem selecionado', 'muitos selecionados');
          break;
          case 1:
          $selectedRows.each(function() {
            var record = $(this).data('record');
            console.log(record);
            location.href = 'administrador/editar/' + record.id;
          });
          break;
          default:
          dialogBlogDialogoOpen('default', 'default');
          break;
        }

        containerSize();
      }

      function getOnClick($value) {
        location.href = 'administrador/editar/' + $value.id;
      }
      function remover() {


      }

    </script>