<div class="alert alert-link" role="alert"><button class="btn" onclick="novo()"><span class="glyphicon glyphicon-plus-sign"> </span> Novo Usuário</button></div>
<div class="row"></div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><b>Filtro de Usuários</b></h3>
    </div>

    <div class="panel-body">
        <form id="formFiltrar">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nomeUsuario" placeholder="">
                </div>
            </div>
            <div class="row"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" placeholder="">
                </div>
            </div>
            <div class="row"></div>
            <div class="form-group">
                <div class="col-sm-2">
                    <label>Tipo de Usuário</label>
                </div>
                <div class="col-sm-4">
                    <select id="tipoUsuario" class="form-control">
                        <option> </option>
                        <?php foreach ($tipoUsuarios as $tu) { ?>
                        <option value="<?php echo $tu->id ?>"> <?php echo $tu->descricao ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button id="filtrar" type='button' class="btn btn-success pull-right">Filtrar</button>
            </div>
        </form>
    </div>
</div> 

    
    <?php echo jTableStart('usuarios', 'Lista Usuarios', 'administrador/listaUsuarios', '', '', '', array('selecting',  'paging', 'sorting')) ?>
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
          tipoUsuario: $("#tipoUsuarios").val(),
        });
      })

      function editar() {
        alert("teste");
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
        location.href = 'administrador/editar/' + $value.cpf;
      }
      function remover() {


      }
      function novo(){
        location.href = 'administrador/cadastrar/';
          
      }
      

    </script>