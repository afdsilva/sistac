<div class="container-fluid">
  <div class="row">
      <div class="col-xs-12 col-md-8">
          <div class="form-group">
              <?php echo form_label('Ano', 'inputAno', array('class' => 'col-sm-2 control-label')); ?>
              <div class="col-sm-10">
                  <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'inputAno', 'placeholder' => 'Ano', 'disabled' => 'disabled'), $pedido->ano); ?>
              </div>
          </div>
          <div class="form-group">
              <?php echo form_label('Semestre', 'inputSemestre', array('class' => 'col-sm-2 control-label')); ?>
              <div class="col-sm-10">
                  <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Semestre', 'disabled' => 'disabled'), $pedido->semestre); ?>
              </div>
          </div>

      </div>
  </div>

	<div class="row">
		<h4>Lista Atividades: </h4>
	</div>

	<div class="row">
		<?php
		$this->table->set_template(array('table_open' => '<table class="table table-hover">'));
		$this->table->set_heading(array('Cod', 'Descrição', 'Carga Horaria', 'Tipo Atividade', 'Categoria', 'Certificado',''));
		foreach ($atividades as $atividade) {
			$options = array();
			$options[0] = 'Selecione um Certificado';
			foreach ($certificados as $certificado) {
				$options[$certificado->id] = $certificado->descricao;
			}
			$disabled = ($atividade->idCertificado > 0 ? '' : 'disabled');
			$js = 'id="certificado.entry['.$atividade->id.']" 
            		onChange="jQuery.ajax(\''. base_url() . 'aluno/bindCertificado/'. $atividade->codPedido .'/'. $atividade->id.'/\' + this.value + \'/true\');$(\'#remover_'.$atividade->id.'\').prop(\'disabled\',false) "';
			$onClick = 'onClick="$(\'#certificado\\\.entry\\\[\' + '.$atividade->id.' + \'\\\]\').val(0).trigger(\'onchange\');this.disabled=true;"';
			$removerCertificado = form_button(array('id' => 'remover_'.$atividade->id,'class' => 'btn btn-default', $disabled => $disabled), 'Remover', $onClick);
			$certificadosDropDown = form_dropdown('certificado',$options,$atividade->idCertificado,$js);
			$this->table->add_row(array(
				$atividade->id,
				$atividade->descricao,
				$atividade->unidadeAtividade,
				$atividade->tipoAtividade,
				$atividade->categoria,
				$certificadosDropDown,
				$removerCertificado));
		}
		echo $this->table->generate();
		?>
	</div>

  <div class="row nameless form-btn-label" id="envioCertificado">
    <?php
			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
			//chrome dah problema
			$onChange = "$('#inputDescricao').val(this.value.substring(this.value.lastIndexOf('\\\')+1, this.value.lastIndexOf('.')))";
			echo form_open_multipart('aluno/inserirCertificado/' . $aluno->cpf, $attributes);
			echo form_label('Enviar certificado', 'inputDescricao');
		?>
		<span class="btn btn-default btn-file">
    	Procurar <?php echo form_upload(array('name' => 'fileCertificado', 'id' => 'fileCertificado', 'onChange' => $onChange)); ?>
    </span>
		<?php
			echo form_submit(array('name' => 'upload', 'class' => 'btn btn-default', 'value' => 'Enviar'));
			echo form_input(array('name' => 'descricaoCertificado', 'class' => 'form-control', 'id' => 'inputDescricao', 'placeholder' => 'Descrição'));
			echo form_close(); 
		?>
  </div>
  <?php if(!empty($certificados)): ?>
  	<div class="row">
			<h4>Lista Certificados: </h4>
		</div>
		<div id="certificados" class="row col-xs-12 col-md-8">
			<?php
				$this->table->set_template(array('table_open' => '<table class="table table-hover">'));
				$this->table->set_heading(array('Cod', 'Descrição', 'Ação'));
				foreach ($certificados as $certificado) {
					$onclick  = 'onClick="window.location.href=\''. base_url() . 'aluno/downloadCertificado/'. $certificado->idAluno .'/'. $certificado->id.'\' " ';
					$visualizarCertificado = form_button(array('name' => 'visualizarCertificado', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $certificado->id), 'Visualizar', $onclick);
					//deleteCertificado
					$onclick  = 'onClick="window.location.href=\''. base_url() . 'aluno/deleteCertificado/'. $certificado->idAluno .'/'. $certificado->id.'\' " ';
					$removerCertificado = form_button(array('name' => 'removerCertificado', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $certificado->id), 'Remover', $onclick);
					$this->table->add_row(array(
						$certificado->id,
						$certificado->descricao,
						$visualizarCertificado . nbs(1) . $removerCertificado
					));
				}
				echo $this->table->generate();
			?>
		</div>
	<?php endif?>
</div>