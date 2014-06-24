
    <div class="container col-sm-8 col-md-offset-2">
        <h2> Editar Usuário</h2>
        <form class="form-horizontal well" role="form">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" 
                           placeholder="">
                </div>
            </div>
            
            <div class="form-group">
                <label for="cpf" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cpf" 
                           placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="curso" class="col-sm-2 control-label">Curso</label>
                <div class="col-sm-3">
                    <select id="curso" class='form-control'>
                        <option>3900 - Ciência da Computação</option>
                        <option>3910 - Engenharia da Computação</option>
                        <?php
                        //foreach ($categorias as $categoria)
                        //echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                        ?>    
                    </select>
                </div>

                <label for="tipoUsuario" class="col-sm-2 control-label">Tipo de Usuário</label>
                <div class="col-sm-5">
                    <select id="tipoAtividade" class='form-control '>
                        <option>Administrador</option>
                        <option>Coordenador</option>
                        <option>Gerente</option>
                        <?php
                        //foreach ($tipoAtividades as $tipoAtividade)
                          //  echo '<option>' . $tipoAtividade->nome . '</option>';
                        ?>    
                    </select>
                </div>
            </div>
            
    <h2> Acesso ao Sistac</h2>
        <form class="form-horizontal well" role="form">
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" 
                           placeholder="">
                </div>
            </div>
            
            <div class="form-group">
                <label for="senha" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
              <input type="text" class="form-control" id="senha" 
                           placeholder="">
                </div>
            </div>
            <hr>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success">Salvar</button>
        </div>
    </div>
    </div>

        </form>
    </div>
</div>