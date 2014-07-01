
<div class="container col-sm-8 col-md-offset-2">
    <div class="row">
        <div class="form-group well-sm">
            <form class="well">
                <div class="container">
                    <b><label style="font-size:14pt" for="lblIdentificacao">Identificações</label></b>
                    <div class="form-group">
                      <label for="lblNome">Nome</label>
                      <input type="text" value="<?php echo($usuario->nome);?>" id="txtNome" class="form-control ">
                    </div>
                    <div class="form-group ">
                        <label for="lblCPF">CPF</label>
                        <input type="text" value="<?php echo($usuario->cpf);?>" id="txtCPF" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lblCurso">Curso</label>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="input-group">
                              <?php
                                echo("<select id=idCurso> <option value=0></option>");
                                  foreach ($cursos as $curso) {
                                    echo("<option value='".$curso->id."' ");
                                    if($curso->id==$usuario->codCurso){
                                        echo("selected");
                                    }
                                    echo(">".$curso->id." - ".$curso->nome."</option>");
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
                                            echo("<option value='".$tipoUsuario->id."' ");
                                            if($tipoUsuario->id == $usuario->codTipoUsuario){
                                                echo("selected");
                                            }
                                            echo(">".$tipoUsuario->descricao."</option>");
                                            //echo '<li><a onClick="selecionaTipoUsuario(\'' . $tipoUsuario->id . ',' . $tipoUsuario->descricao . '\')">' . $tipoUsuario->descricao . ' </a></li>';
                                        }
                                        echo("</select>");
                                    ?>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lblNome">Email</label>
                        <input type="text" value="<?php echo($usuario->email);?>" class="form-control" id="txtEmail">
                    </div>

                    <button type="button" class="btn btn-success" onclick="enviar()">Salvar</button>
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

        $.post('<?= base_url() ?>administrador/salvar',
                {
                    nome: $("#txtNome").val(),
                    cpf: $("#txtCPF").val(),
                    curso: $('#idCurso').html(),
                    tipoUsuario: $('#idTipoUsuario').html(),
                    email: $("#txtEmail").val()
                },
        function(data) {
            if (data == 'sucesso') {
                alert("Cadastro feito com sucesso!");
                window.location.href = "<?= base_url() . 'administrador/'; ?>"
            } else {
                alert("Houve uma falha, tente novamente");
            }
        });

    }
</script>
