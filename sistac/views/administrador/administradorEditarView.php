
<div class="container col-sm-8 col-md-offset-2">
    <div class="row">
        <div class="form-group well-sm">
            <form class="well">
                <div class="container">
                    <b><label style="font-size:14pt" for="lblIdentificacao">Identifique-se</label></b>
                    <div class="form-group">
                        <label for="lblNome">Nome</label>
                        <input type="text" id="txtNome" class="form-control " placeholder="Insira seu nome">
                        </div>
                    <div clas s="form-group ">
                        <label for="lblCPF">CPF</label>
                        <input type="text" id="txtCPF" class="form-control" placeholder="Insira seu CPF">
                    </div>

                    <div class="form-group">
                        <label for="lblCurso">Curso</label>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <a id="botaoCurso" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Selecione o curso <span class="caret"></span></a>
                                        <a id="idCurso"  hidden="true"></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            foreach ($cursos as $curso) {
                                                echo '<li><a onClick="selecionaCurso(\'' . $curso->id . ',' . $curso->nome . '\')">' . $curso->nome . ' </a></li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lbltipoUsuario">Tipo Usuário</label>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <a id="botaoCurso" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                        <a id="idCurso"  hidden="true"></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            foreach ($cursos as $curso) {
                                                echo '<li><a onClick="selecionaCurso(\'' . $curso->id . ',' . $curso->nome . '\')">' . $curso->nome . ' </a></li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    
                    <hr>
                    <div class="container">
                        <b><label style="font-size:14pt" for="acesso">Acesso ao Usuário</label></b>
                        <div class="form-group">
                            <label for="lblNome">Email</label>
                            <input type="text" class="form-control" id="txtEmail" placeholder="Insira seu email do @inf.ufpel.edu.br">
                        </div>
                        <div class="form-group">
                            <label for="lblCPF">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" placeholder="Sua senha para acesso">
                        </div>
                    </div>

                    <button type="button" class="btn btn-success" onclick="enviar()">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function selecionaCurso($parametros) {
        var curso = $parametros.split(',');
        $('#idCurso').html(curso[0]);
        $('#botaoCurso').html(curso[1] + ' <span class="caret"></span>');

    }


    function enviar() {

        $.post('<?= base_url() ?>cadastrar/salvar',
                {
                    nome: $("#txtNome").val(),
                    cpf: $("#txtCPF").val(),
                    curso: $('#idCurso').html(),
                    email: $("#txtEmail").val(),
                    senha: $("#txtSenha").val()
                },
        function(data) {
            if (data == 'sucesso') {
                alert("Cadastro feito com sucesso!");
                window.location.href = "<?= base_url() . 'login/'; ?>"
            } else {
                alert("Houve uma falha, tente novamente");
            }
        });

    }
</script>
