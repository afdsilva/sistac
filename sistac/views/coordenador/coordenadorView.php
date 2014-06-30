<div class="container col-md-12">
    <ol class="breadcrumb">
        <li><b>Coordenador</b></li>
        <li><a href="<?= base_url() ?>coordenador">Filtro</a></li>
    </ol>

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
                <button type='button' class="btn btn-success btn-lg pull-right" onclick='editar()'>Editar</button>
            </div>
        </form>        
    </div>
</div>

<script>

    function filtrar() {
        
        alert($('#status').val());
        
        var semestre = $('#semestre').val();
        var ano = $('#ano').val();
    }
    function gerarRelatorio() {
    }

</script>