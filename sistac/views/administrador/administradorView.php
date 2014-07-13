
<div class="container col-sm-8 col-md-offset-2">
    <div class="row">
        <div class="form-group well-sm">
            <form class="well">
                <div class="container">
                    <b><label style="font-size:14pt" for="lblIdentificacao">Identificações</label></b>
                    <div class="form-group">
                        <label for="lblNome">Nome</label>
                        <input type="text" id="txtNome" class="form-control " placeholder="">
                        </div>
                    <div class="form-group ">
                        <label for="lblCPF">CPF</label>
                        <input type="text" id="txtCPF" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="lblCurso">Curso</label>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <?php
                                        echo("<select id='idCurso'> <option value=0></option>");
                                        foreach ($cursos as $curso) {
                                            echo("<option value='".$curso->id."'>".$curso->nome."</option>");
                                            //echo '<li><a onClick="selecionaTipoUsuario(\'' . $tipoUsuario->id . ',' . $tipoUsuario->descricao . '\')">' . $tipoUsuario->descricao . ' </a></li>';
                                        }
                                        echo("</select>");
                                    ?>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lbltipoUsuario">Tipo Usuário</label>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <?php
                                        echo("<select id='idTipoUsuario'> <option value=0></option>");
                                        foreach ($tipoUsuario as $tipoUsuario) {
                                            echo("<option value='".$tipoUsuario->id."'>".$tipoUsuario->descricao."</option>");
                                            //echo '<li><a onClick="selecionaTipoUsuario(\'' . $tipoUsuario->id . ',' . $tipoUsuario->descricao . '\')">' . $tipoUsuario->descricao . ' </a></li>';
                                        }
                                        echo("</select>");
                                    ?>

                                    
                                </div>
                            </div>  
                        </div>
                    </div>
                    
                   
                    <div class="container">
                        <b><label style="font-size:14pt" for="acesso">Acesso ao Usuário</label></b>
                        <div class="form-group">
                            <label for="lblNome">Email</label>
                            <input type="text" class="form-control" id="txtEmail" placeholder="Inserir email do @inf.ufpel.edu.br">
                        </div>
                        <div class="form-group">
                            <label for="lblCPF">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" placeholder="Senha para acesso">
                        </div>
                    </div>

                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-success pull-right" onclick="enviar()">Salvar</button>
                    </div>
                </div>                
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
    
    function selecionaTipoUsuario($parametros) {
        var tipoUsuario = $parametros.split(',');
        $('#idTipoUsuario').html(curso[0]);
        $('#botaoTipoUsuario').html(curso[1] + ' <span class="caret"></span>');

    }


    function enviar() {
        $.post('salvar',
                {
                    nome: $("#txtNome").val(),
                    cpf: $("#txtCPF").val(),
                    curso: $('#idCurso').html(),
                    tipoUsuario: $('#idTipoUsuario').html(),
                    email: $("#txtEmail").val(),
                    senha: $("#txtSenha").val()
                },
                function(data) {
                    if (data === 'sucesso') {
                        $('#sucesso').modal('show');
                    } 
                    else {
                        $('#falha').modal('show');
                    }
                }
        );
    }
</script>