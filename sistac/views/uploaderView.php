<div>
	Uploader Teste
</div>

<?php echo $error;?>

<?php echo form_open_multipart('uploader/do_upload');?>

<?php 
$data = array(  'name'        => 'username',
              'id'          => 'username',
              'value'       => 'Andre',);
echo form_label("Label: ",'username' );
echo form_input($data).br(1);
?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
<?php if ($pedido) {?>
<div>
	<label> Nome: </label><input type="text" value="<?php echo $pedido['nome'];?>" /> <br/>
	<label> Curso: </label><input type="text" value="<?php echo $pedido['nomeCurso'];?>" /> <br/>
	<br/>
<?php 
	echo heading("Atividades", 4);
	foreach($pedido['atividades'] as $atividade) {
		echo form_label('Atividade','atividade');
		echo form_input(array('id' => 'atividade'),$atividade['descricao']) . '<br/>';?>
	<label> Certificado: </label><input type="text" value="<?php echo $atividade['arquivoURL'];?>" /> <br/>
	<label> Unidade: </label><input type="text" value="<?php echo $atividade['unidadeAtividade'];?>" /> <br/>
	<label> Tipo Atividade: </label><input type="text" value="<?php echo $atividade['nomeTipoAtividade'];?>" /> <input type="hidden" value="<?php echo $atividade['codTipoAtividade'];?>" /> <br/>
	<label> Categoria: </label><input type="text" value="<?php echo $atividade['nomeCategoria'];?>" /> <input type="hidden" value="<?php echo $atividade['codCategoria'];?>" /> <br/>
<?php	} ?>
</div>
<?php }?>