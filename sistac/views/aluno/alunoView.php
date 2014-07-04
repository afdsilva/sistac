<div class="row container-fluid">
  <div id="summary-of-hours" class="row">
    <h3>Resumo de horas</h3>
    <ul>
      <li><span class="glyphicon glyphicon-search"></span><span>Pesquisa:</span> <?php echo $horasPesquisa; ?>/100</li>
      <li><span class="glyphicon glyphicon-pencil"></span><span>Ensino:</span> <?php echo $horasEnsino; ?>/100</li>
      <li><span class="glyphicon glyphicon-share"></span><span>Extensão:</span> <?php echo $horasExtensao; ?>/100</li>
    </ul>
  </div> 

  <div class="row" style="margin:10px 0;">
    <div class="col-md-1">
      <?php echo form_button(array('name' => 'novo', 'class' => 'btn btn-default'), 'Novo','onClick=$("#resumo").toggle()') . br(1); ?>
    </div>
    <?php if (!empty($pedido)): ?>
    <div class="col-md-1">
      <?php echo form_button(array('name' => 'editar', 'class' => 'btn btn-default', 'value' => 'editar'), 'Editar Pedido','onClick="window.location.href=\''. base_url() . 'aluno/pedido\'"') . br(1); ?>
    </div>
    <?php endif ?>
  </div>

  <div class="row nameless form-btn-label" id="resumo" style="display: none;">
    <?php
      $attributes = array('class' => 'form-horizontal', 'role' => 'form');

      echo form_open_multipart('aluno/novoPedido/' . $aluno->cpf, $attributes);
      echo form_label('Enviar Pedido', 'novoPedido');
    ?>
    <span class="btn btn-default btn-file">
      Procurar <?php echo form_upload(array('name' => 'novoPedido', 'value' => '')); ?>
      </span>
    <?php    
      echo form_submit(array('name' => 'upload', 'class' => 'btn btn-default', 'value' => 'Enviar'));
      echo form_close(); 
    ?>
  </div>

  <div class="row">
    <h4>Resumo de Atividades: </h4>

    <div>
      <?php
      $this->table->set_template(array('table_open' => '<table class="table table-hover">'));
      $this->table->set_heading(array('Cod', 'Descricao', 'Carga Horaria', 'Tipo Atividade', 'Categoria','Certificado'));
      foreach ($atividades as $atividade) {
       $this->table->add_row(array(
         $atividade->id,
         character_limiter($atividade->descricao,20,'...'),
         character_limiter($atividade->unidadeAtividade,20,'...'),
         character_limiter($atividade->tipoAtividade,20,'...'),
         character_limiter($atividade->categoria,20,'...'),
         character_limiter($atividade->certificado,20,'...'),
  					//form_button(array('name' => 'editar', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => $pedido->id), 'Editar') . nbs(2) .
  					//form_button(array('name' => 'remover', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => $pedido->id), 'Remover', 'onClick="removerPedido(\''.$pedido->id. ' \')"')
         ));
     }
     echo $this->table->generate();
     ?>
   </div>
  </div>
</div>