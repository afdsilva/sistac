<div class="row">
    <div class="container col-sm-8 col-md-offset-2">
        <h2> Edição</h2>
        <form class="form-horizontal well" role="form">
            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descricao" 
                           placeholder="Digite a descrição da atividade">
                </div>
            </div>

            <div class="form-group">
                <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-3">
                    <select id="categoria" class='form-control'>
                        <option></option>
                        <?php
                        foreach ($categorias as $categoria)
                            echo '<option>' . $categoria->id . ' - ' . $categoria->nome . '</option>';
                        ?>    
                    </select>
                </div>

                <label for="tipoAtividade" class="col-sm-2 control-label">Tipo Atividade</label>
                <div class="col-sm-5">
                    <select id="tipoAtividade" class='form-control '>
                        <option></option>
                        <?php
                        foreach ($tipoAtividades as $tipoAtividade)
                            echo '<option>' . $tipoAtividade->nome . '</option>';
                        ?>    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="unidade" class="col-sm-2 control-label"> Unidade <?php /* echo @$unidade->nome */?></label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="unidade" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="certificado" class="col-sm-2 control-label">Certificado</label>
                <div class="col-sm-3">
                    <?php
                    //if ($atividade->arquivoURL != NULL) {
                        echo '<button type="button" class="btn btn-primary" id="certificado" placeholder="">Visualizar</button>';
                    //}
                    ?>
                </div>
            </div>
            <hr>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-success">Salvar</button>
        </div>
    </div>
    </div>

</form></div>

<div class="row">


    <div class="container col-sm-8 col-md-offset-2">
        <?php /*
          $this->table->set_template(array('table_open' => '<table class="table table-hover"">'));
          $this->table->set_heading(array('Descrição', 'Categoria', 'Hr. Reais', 'Hr. Aproveitadas', 'Unidade', 'Certificado', 'Ações'
          ));
          if (@$atividades != NULL) {
          foreach ($atividades as $atividade) {
          $this->table->add_row(array(
          $atividade->descricao,
          @$atividade->categoria,
          @$atividade->horas,
          @$atividade->aproveitamento,
          @$atividade->unidade,
          @$atividade->certificado,
          form_button(array('name' => 'editar', 'type' => 'button', 'class' => 'btn btn-default', 'value' => @$atividade->id), 'Editar', 'onClick="editar(\'' . @$atividade->id . ' \')"'),
          form_button(array('name' => 'remover', 'type' => 'button', 'class' => 'btn btn-default', 'value' => @$atividade->id), 'Remover', 'onClick="remover(\'' . @$atividade->id . '\')"')
          ));
          }
          }
          echo $this->table->generate();
         */ ?>
    </div>
</div>
</div>

<script>



</script>