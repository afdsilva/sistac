<?php 
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open('aluno/pedido/',$attributes);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-8"> Novo Pedido
		</div>
		<div class="col-xs-6 col-md-4"></div>
	</div>
</div>

<?php echo form_close();?>
