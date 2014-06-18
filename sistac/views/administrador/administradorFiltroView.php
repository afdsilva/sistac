<ol class="breadcrumb">
  <li><b>Administrador</b></li>
  <li><a href="<?= base_url() ?>administrador">Filtro</a></li>

  
</ol>
<div class="form-group">
    <button type='button' class="btn btn-success btn-lg pull-right" onclick='cadastrar()'>Novo Usuário</button>
</div>
<div class="row">
<div class="container col-sm-8 col-md-offset-2">
    <div class="form-group well-sm">
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
                        <option>Administrador</option>
                        <option>Gerente</option>
                        <option>Coordenador</option>
                        <option>Aluno</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type='button' class="btn btn-success btn-lg pull-right" onclick='filtrar()'>Filtrar</button>
            </div>
            <div class="form-group">
                <button type='button' class="btn btn-success btn-lg pull-right" onclick='editar()'>Editar</button>
            </div>
        </form>
    </div>
        </div>

    <div class="row">  
        <div class="container col-sm-8 col-md-offset-2">
            
            <?php 
                $this->load->library('table');
                echo $this->table->generate($Usuario);
                //var_dump($Usuario);
            ?>
            
            <?php //echo jTableStart('Usuario','Usuários','administrador/listaUsuarios','','','',array('selecting'))?>
            <?php //echo jPanelAddID(true, false, false, false) ?>
                <?php //echo jPanelAddCampo('nome', 'Nome', '', '25%',true,false,true)?>
                <?php //echo jPanelAddCampo('email', 'Email', '', '25%',true,false,false)?>
                <?php //echo jPanelAddCampo('tipoUsuario', 'Tipo de Usuário', '', '20%',true,false,false)?>
            <?php //echo jTableEnd()?>
        </div>
    </div>
</div>

<script>
    

    $('#filtrar').click(function(){
        $('#usuarios ').jtable('load', {
                nome: $('#nome').val(),
                email: $("#email").val(),
                tipoUsuario: $("#tipoUsuario").val()
            });
    })

    function editar() {
        var $selectedRows = $('#usuarios').jtable('selectedRows');
        switch ($selectedRows.length) {
            case 0:
                dialogBlogDialogoOpen('nenhuma seleção', 'muitos selecionados');
                break;
            case 1:
                $selectedRows.each(function() {
                    var record = $(this).data('record');
                    console.log(record);
                    location.href = 'administrador/editar/'+record.id;
                });
                break;
            default:
                dialogBlogDialogoOpen('default', 'default');
                break;
        }
    }

    function getOnClick($value){
        location.href = 'administrador/editar/'+$value.id;   
    }
    function remover() {


    }
</script>
