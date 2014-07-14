<h1>Notificar Aluno</h1>
<div class="container well">
    <form>
        <div class="form-group col-sm-12">
            <div class="col-sm-3">
                <input type="hidden" class="form-control" id="nome" value="<?php echo $aluno->email ?>">
                <input type="hidden" class="form-control" id="email" value="<?php echo $aluno->email ?>">
                <label><?php echo $aluno->nome ?></label>
                <label><?php echo $aluno->email ?></label>
            </div>
        </div>

        <div class="form-group row " style="padding: 20px">    
            <div class="col-sm-3">
                <label>Mensagem</label>
            </div>
            <textarea class="form-control" rows="8" id="mensagem"></textarea>
        </div>    
        <div class="row"></div>
        <button class="btn btn-primary col-md-2 pull-right" onclick="enviar()">Enviar</button>
    </form>
</div>

<script>

    function enviar() {

        
        
        $.post('../enviarEmail',
                {
                    nome: $('#nome').val(),
                    email: $('#email').val(),
                    mensagem: $('#mensagem').val()
                },
                function(data) {
                    if (data == 'sucesso') {
                    } else {
                    }
                });
    }


</script>