

<!-- 

    Formulário de Cadastro
==============================================================
--> 
<div class="container col-sm-8 col-md-offset-2">
    <div class="row">
        <div class="form-group well-sm">
            <form class="well">
                <b><label style="font-size:14pt" for="lblIdentificacao">Identificação</label></b>
                <br>
                <div style="padding: 10px 0 0 0;border-top: 1px solid #999;"></div>
                <div class="form-group">
                    <label for="lblNome">Nome</label>
                    <input type="text" id="txtNome" class="form-control " placeholder="Insira seu nome" value="<?php echo($usuario->nome);?>">
                </div>

                    <input type="hidden" id="txtCPF" class="form-control" placeholder="Insira seu CPF" value="<?php echo($usuario->cpf);?>">
                <br>

                <label for="lblCurso">Curso</label>

                <div class="form-group">
                    <div class="col-sm-6">
                        <select id="curso" class="form-control" >
                            <option> </option> 
                            <?php foreach ($cursos as $c) { ?>
                                <option value="<?php echo $c->id; ?>"> <?php echo $c->nome; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <label for="lblTipoUsuario">Tipo de Usuário</label>

                <div class="form-group">
                    <div class="col-sm-6">
                        <select id="tipoUsuario" class="form-control" >
                            <option> </option> 
                            <?php foreach ($tipoUsuario as $tu) { ?>
                                <option value="<?php echo $tu->id; ?>"> <?php echo $tu->descricao; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <br>
                <br>
                <div style="padding: 10px 0 0 0;border-top: 1px solid #999;">
                    <b><label style="font-size:14pt" for="acesso">Acesso ao Usuário</label></b>
                    <div class="form-group">
                        <label for="lblNome">Email</label>
                        <input type="text" class="form-control" id="txtEmail" placeholder="Insira seu email do @inf.ufpel.edu.br" pattern="^[\w]+@inf\.ufpel\.edu\.br" value="<?php echo($usuario->email);?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                        <button type="button" class="btn btn-success pull-right" onclick="salvar()">Salvar</button>
                        <?php 
                            if($usuario->cpf != $this->session->userdata('user')->cpf)
                                echo '<button type="button" class="btn btn-danger pull-right" onclick="remover()">Remover</button>';
                        ?>
                    </div>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>

<!-- 

    Alertas Personalizados
==============================================================
-->    
<div class="modal fade" id="sucesso" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <div class="modal-body">
                    <b><h4>Registro salvo com sucesso!</h4></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresh()">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="falha" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <b><h4>Ocorreu uma falha tente novamente!</h4></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    
    // carrega os valores das combos
    window.onload = function(){
        $('#curso').val(<?php echo $usuario->codCurso; ?>).change();
        $('#tipoUsuario').val(<?php echo $usuario->codTipoUsuario; ?>).change();
    }
    
    function refresh() {
        location.href = '../../administrador';
    }

    function salvar() {
        $.post('../salvar',
                {
                    nome: $("#txtNome").val(),
                    cpf: $("#txtCPF").val(),
                    curso: $('#curso').val(),
                    tipoUsuario: $('#tipoUsuario').val(),
                    email: $("#txtEmail").val(),
                    tipo: 2
                },
        function(data) {
            if (data == 'sucesso') {
                $('#sucesso').modal('show');
            }
            else {
                $('#falha').modal('show');
            }
        }
        );
    }
    
    function remover(){
        
        $.post('../remover',
            {
                tipoUsuario: $("#tipoUsuario").val(),
                cpf: $("#txtCPF").val()
            },
            function(data) {
                if (data == 'sucesso') {
                    $('#sucesso').modal('show');
                }
                else {
                    $('#falha').modal('show');
                }
            }
        );

        
        
    }
</script>
