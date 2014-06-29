<div class="row">
    <div class="container col-sm-8 col-md-offset-2">
        <div class="form-group well-sm">
            <form class="form-horizontal well" role="form">
                <h3><strong>Filtro</strong></h3>
                <hr>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ano" placeholder="Ano">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Semestre</label>
                    <div class="col-sm-3">
                        <select id="semestre" class="form-control">
                            <option> </option>
                            <option value="1">1° Semestre</option>
                            <option value="2">2° Semestre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-3">
                        <select id="status" class="form-control">
                            <option> </option>
                            <?php foreach ($status as $st){ ?>
                                <option value="<?php echo $st->id ?>"> <?php echo $st->nome ?> </option>
                            <?php   } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type='button' class="btn btn-success btn-lg pull-right" onclick='filtrar()'>Filtrar</button>
                </div>
            </form>
        </div>
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