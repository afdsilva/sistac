<ol class="breadcrumb">
  <li><b>Administrador</b></li>
  <li><a href="<?= base_url() ?>administrador">Filtro</a></li>
  <li class="active">Editar</li>
  <li class="active"><?php echo $usuarioId; ?></li>
  
</ol>
<div class="row">
    <div class="container col-sm-8 col-md-offset-2">
        <h2> Identificação</h2>
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
                    <select id="codCurso" class='form-control' placeholder="Selecione o Curso">
                        <option>Ciencia da Computaçao</option>
                        <option>Engenharia da Computaçao</option>
                        <?php
                        //foreach ($categorias as $categoria)
                          //  echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                        ?>    
                    </select>
                </div>
                <div class="form-group">
                <label for="tipoUsuario" class="col-sm-2 control-label">Tipo de Usuário</label>
                <div class="col-sm-3">
                    <select id="codTipoUsuario" class='form-control' placeholder="Selecione o Tipo de Usuário">
                        <option>Administrador</option>
                        <option>Coordenador</option>
                        <option>Gerente</option>
                        <?php
                        //foreach ($categorias as $categoria)
                          //  echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                        ?>    
                    </select>
                </div>

          <h2> Acesso ao Sistema </h2>
        <form class="form-horizontal well" role="form">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
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
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success"onclick='salvar()'>Cadastrar</button>
        </div>
    </div>
</div>

</form></div>