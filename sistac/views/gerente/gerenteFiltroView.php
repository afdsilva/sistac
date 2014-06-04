<div class="row">
<div class="container col-sm-8 col-md-offset-2">
    <div class="form-group well-sm">
        <form class="form-horizontal well" role="form">
            <h3><strong>Filtro</strong></h3>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label">Ano</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="ano" placeholder="Digite o ano">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Semestre</label>
                <div class="col-sm-3">
                    <select id="semestre" class="form-control">
                        <option>1</option>
                        <option>2</option>
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

            
            <?php echo jTableStart('pedidos','Pedidos','gerente/listaPedidos','','','',array('selecting'))?>
                <?php echo jPanelAddID(true,true,true)?>
                <?php echo jPanelAddCampo('nome', 'Nome', '', '25%',true,false,true)?>
                <?php echo jPanelAddCampo('curso', 'Curso', '', '15%',true,false,false)?>
                <?php echo jPanelAddCampo('ano', 'Ano', '', '10%',true,false,false)?>
                <?php echo jPanelAddCampo('status', 'Status', '', '20%',true,false,false)?>
            <?php echo jTableEnd()?>
        </div>
    </div>
</div>

<script>

    function filtrar() {
        
        $('#pedidos').jtable('load', {
                ano: $("#ano").val(),
                semestre: $("#semestre").val()
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
        location.href = '<?=base_url()?>gerente/editar/'+id;
    }

    function remover() {


    }

</script>