<?php require_once(dirname(__FILE__) . '/header.php'); ?>

<div class="title">Relação de Alunos Aptos a Formatura</div>

<div>
	A coordenação do curso <?php echo $curso; ?> da Universidade Federal de Pelotas informa a relação de alunos aptos a formatura no <?php echo $semestre; ?>º semestre de <?php echo $ano; ?>.
</div>

<?php
$this->table->set_template(array('table_open' => '<table class="table" cellspacing="0" border="1">'));
$this->table->set_heading(array('Matricula', 'Nome', 'Ano', 'Curso', 'Pesquisa', 'Ensino','Extensão'));

foreach($alunos as $aluno){
	$this->table->add_row(array(
		$aluno['id'],
		$aluno['nome'],
		$aluno['anoSemestre'],
		$aluno['curso'],
		$aluno['categoria']['pesquisa'],
		$aluno['categoria']['ensino'],
		$aluno['categoria']['extensao']
	));
}

echo $this->table->generate();
?>

<?php require_once(dirname(__FILE__) . '/footer.php'); ?>

