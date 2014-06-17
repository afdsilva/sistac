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
            
            <?//php echo jTableStart('usuario','Usuários','administrador/listaUsuarios','','','',array('selecting'))?>
                <?//php echo jPanelAddID(true,true,true)?>
                <?//php echo jPanelAddCampo('nome', 'Nome', '', '25%',true,false,true)?>
                <?//php echo jPanelAddCampo('email', 'Email', '', '25%',true,false,false)?>
                <?//php echo jPanelAddCampo('descrição', 'Tipo de Usuário', '', '20%',true,false,false)?>
            <?//php echo jTableEnd()?>
        </div>
    </div>
</div>

<script>

    function filtrar() {
        
        $('#usuario').jtable('load', {
                nome: $("#nome").val(),
                email: $("#email").val(),
                tipoUsuario: $('#tipoUsuario').val()
            });
        
        /*
        $.post('<? base_url() ?>gerente/filtrar',
                {
                    ano: $("#ano").val(),
                    semestre: $("#semestre").val()
                },
        function(data){
        });*/
    }

    function editar(id) {
        location.href = '<?=base_url()?>administrador/editar/'+id;
    }

    function remover() {


    }

</script>