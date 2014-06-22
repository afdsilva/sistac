<div id="content" class="container-fluid">
    <div class="row">
    	<div class="container-fluid">
    		<h3>Resumo de horas</h3>
    	</div>
    	<!-- Caso as horas estejam abaixo do minimo necessario deve conter um indicativo -->
		<div class="row">Pesquisa: <?php echo $horasPesquisa; ?></div>
		<div class="row">Extensão: <?php echo $horasExtensao; ?></div>
		<div class="row">Ensino: <?php echo $horasEnsino; ?></div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php echo form_button(array('name' => 'novo', 'class' => 'btn btn-default'), 'Novo','onClick=$("#resumo").toggle()') . br(1); ?>
        </div>
        <?php if (!empty($pedido)) { ?>
        <div class="col-md-2">
            <?php echo form_button(array('name' => 'editar', 'class' => 'btn btn-default', 'value' => 'editar'), 'Editar Pedido','onClick="window.location.href=\''. base_url() . 'aluno/pedido\'"') . br(1); ?>
        </div>
        <?php } ?>
        <div class="col-xs-6 col-md-4"></div>
	</div>
    <div class="row" id="resumo" <?php if (!empty($pedido)) echo 'style="display: none;"';?>>
        <div class="highlight">
        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        echo form_open_multipart('aluno/novoPedido/' . $aluno->cpf, $attributes);
            echo form_label('Enviar Pedido', 'novoPedido');
            echo form_upload('novoPedido');
            echo form_submit('upload', 'Enviar');
         echo form_close(); 
         ?>
            </div>
    </div>
    <div class="row">
		<h4>Resumo de Atividades: </h4>
        
        <div class="col-xs-12 col-md-8">
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
        <div class="col-xs-6 col-md-4"></div>
        
    </div>
</div>
<script>

</script>    