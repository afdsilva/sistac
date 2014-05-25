<div id="content" class="container-fluid">
	<div class="row">
	 <div class="col-xs-12 col-md-8">
	 <div class="form-group">
	 <?php echo form_label('Ano','inputAno',array('class' => 'col-sm-2 control-label'));?>
	    <div class="col-sm-10">
	    <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'inputAno', 'placeholder' => 'Ano'),$pedido->ano);?>
	    </div>
	  </div>
	 <div class="form-group">
	 <?php echo form_label('Semestre','inputSemestre',array('class' => 'col-sm-2 control-label'));?>
	    <div class="col-sm-10">
	    <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Semestre'),$pedido->semestre);?>
	    </div>
	  </div>
<?php 
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('aluno/uploadPedido/',$attributes);
?>
	<div class="form-group">
		<?php echo form_label('Upload','inputSemestre',array('class' => 'col-sm-2 control-label'));?>
		<?php echo form_hidden('idPedido',$pedido->id);?>
		<?php echo form_upload('uploadPedido');?>
		<?php echo form_submit('upload','Enviar');?>
	</div>

<?php echo form_close();?>
	  </div>
	</div>
	<?php /**
	<div class="row">
		<h5>Atividade: </h5>
		<div class="col-xs-12 col-md-8">
			<div class="form-group">
				<?php echo form_label('Descrição','inputDescricao',array('class' => 'col-sm-2 control-label'));?>
				<?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'inputDescricao', 'placeholder' => 'Descrição'));?>
			</div>
			<div class="form-group">
				<?php echo form_label('Tipo de Atividade','selectTipoAtividade',array('class' => 'col-sm-2 control-label'));?>
				<?php echo form_dropdown('selectTipoAtividade',$tipoAtividades,'','class="form-control"');?>
			</div>
			<div class="form-group">
				<?php echo form_label('Categoria','selectCategoria',array('class' => 'col-sm-2 control-label'));?>
				<?php echo form_dropdown('selectCategoria',$categorias,'','class="form-control"');?>
			</div>
			<div class="form-group">
				<?php echo form_button(array('name' => 'remover', 'class' => 'btn btn-default', 'value' => 'novo' ),'Remover') . nbs(1);?>
				<?php echo form_button(array('name' => 'novo', 'class' => 'btn btn-default', 'value' => 'novo' ),'Novo') . nbs(1);?>
				<?php echo form_button(array('name' => 'salvar', 'class' => 'btn btn-default', 'value' => 'novo' ),'Salvar') . nbs(1);?>
			</div>
		</div>
		**/ ?>
	<div class="row">
		<h5>Lista Atividades: </h5>
	</div>
	<div class="row">
	<?php
	$attributes = array('class' => 'form-horizontal', 'role' => 'form');
	echo form_open('aluno/pedido/'.$pedido->id.'/atividade/',$attributes);
	?>
		<div class="col-xs-12 col-md-8">
<?php 
			$this->table->set_template(array('table_open' => '<table class="table table-hover">')); 
			$this->table->set_heading(array('Cod', 'Descrição', 'Carga Horaria', 'Tipo Atividade', 'Categoria', 'Certificado' ,'Ações'
				));
			foreach ($atividades as $atividade)
				$this->table->add_row(array(
						$atividade->id,
						$atividade->descricao,
						$atividade->unidadeAtividade,
						$atividade->tipoAtividade,
						$atividade->categoria,
						form_dropdown('selectCertificado',array('Selecione um Certificado'),'class=form-control'), 
						form_button(array('name' => 'removerAtividade', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => $atividade->id ),'Remover') 
			));
			echo $this->table->generate();
?>
		</div>
	<?php echo form_close(); ?>
	</div>
</div>