
<div class="container">

    <div class="container">

        <div> <h1>Bem vindo <?= $pedido->nome; ?> </h1></div>
        <hr>

        <section id="home">

            <div class="jumbotron">
                <h2>Você ainda não fez o pedido de formatura.</h2>
                <h2> <small>Importe o arquivo feito no SISTAC versão DESKTOP. </small></h2>
                <p align="right"><a class="btn btn-lg btn-success" href="" role="button">Importar Pedido</a></p>
            </div>
        </section>



        <div class="container">    
            <section id="status">
                <form class="form-horizontal" method="POST">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="nome">Aluno</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="txtNome"placeholder="nome" value="<?= @$pedido->nome ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                                <input type="text" class="span3" id="txtEmail" placeholder="email" value="<?= @$pedido->email ?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="idPedido">Id Pedido</label>
                            <div class="controls">
                                <input type="text" class="span3" id="txtIdPedido" placeholder="Id" value="<?= @$pedido->id ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="status">Status</label>
                            <div class="controls">
                                <input type="text" class="span3" id="txtStatus" placeholder="status" value="<?= @$pedido->status ?>">
                            </div>
                        </div>
                        <br>
                        <div class="text-muted"> Atividades</div>
                        <hr>
                        <?php foreach ($atividades as $atividade) { ?>
                            <input type="text" class="span3" id="txtAtividade<?= @$atividade['id']; ?>" placeholder="Descrição" value="<?= @$atividade['descricao']; ?>">
                            <input type="text" class="span3" id="txtUnidadeAtividade<?= @$atividade['id'] ?>" placeholder="Unidade" value="<?= @$atividade['unidadeAtividade']; ?>">

                            <br />
                            <?= $error; ?>
                            <?= form_open_multipart('aluno/upCertificado'); ?>
                                <input type="file" name="userfile<?= @$atividade['id']+@$pedido->id ?>" size="20" />
                                <input type="submit" value="upload" />

                            </form>
                    <hr>
                <?php } ?>
                </fieldset>

                <div class="form-actions"style="padding-top:15px">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a onclick="" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script>

    window.onload = function() {
        init();

    }

    function init() {
        var pedido = <?php echo json_encode($pedido->id); ?>;
        if (pedido == null) {
            $("#status").hide();
            $("#home").show();
        } else {
            $("#home").hide();
            $("#status").show();

        }


    }

    function status() {

        $("#home").hide();
        $("#status").show();
    }

    function fazerUploadArquivos() {

        var atividade = document.getElementById("txtAtividade").value;
        var unidade = document.getElementById("txtUnidadeAtividade").value;
    }

</script>

