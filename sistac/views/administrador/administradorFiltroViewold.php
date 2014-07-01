<div class="col-sm-12">
    <div class="form-group well-sm">
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
                    <input type="text" class="form-control" id="nome" placeholder="">
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
                    <select id="" class="form-control">
                        <option></option>
                        <option>Admiinstrador</option>
                        <option>Gerente</option>
                        <option>Coordenador</option>
                        <option>Aluno</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type='button' class="btn btn-success btn-lg pull-right" onClick="filtrar()">Filtrar</button>
            </div>
        </form>
    </div>
    
    <?php echo jTableStart('usuario', 'Usuários', 'administrador/listaUsuarios', '', '', '', array('selecting')) ?>
    <?php echo jPanelAddID(true, true, true) ?>
    <?php echo jPanelAddCampo('nome', 'Nome', '', '25%', true, false, true) ?>
    <?php echo jPanelAddCampo('email', 'Email', '', '25%', true, false, false) ?>
    <?php echo jPanelAddCampo('descricao', 'Tipo de Usuário', '', '20%', true, false, false) ?>
    <?php echo jTableEnd() ?>
</div>
<script>
    
    
    function getOnClick($value) {
        //console.log($value);
        alert($('#usuario').getSelectedRow()); location.href = 'administrador/editar/'; //.id;
    }
    
    
     function filtrar() {
     
     console.log($("#nome").val());
     
     $('#usuario').jtable('load', {
        nome: $("#nome").val(),
        email: $("#email").val(),
        tipoUsuario: $('#tipoUsuario').val()
     });
 }
</script>