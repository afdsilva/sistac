<div id="content" class="container-fluid">
    <div class="row"><h3>Bem vindo <?php echo $aluno->nome; ?> </h3></div>
    <div class="row">
        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        echo form_open('aluno/pedido/', $attributes);
        ?>
        <h4>Pedidos: </h4>
        
        <div class="col-xs-12 col-md-8">
            <?php echo form_button(array('name' => 'novo', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => 'novo'), 'Novo') . br(1); ?>
            <?php
            foreach ($pedidos as $pedido) { 
            $this->table->set_template(array('table_open' => '<table class="table table-hover">'));
            $this->table->set_heading(array('Cod', 'Ano', 'Semestre', 'Ações'));
            $this->table->add_row(array(
                $pedido->id,
                $pedido->ano,
                $pedido->semestre,
                form_button(array('name' => 'editar', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => $pedido->id), 'Editar') . nbs(2) .
                form_button(array('name' => 'remover', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => $pedido->id), 'Remover', 'onClick="removerPedido(\''.$pedido->id. ' \')"')));
            echo $this->table->generate();
            ?>
        <?php }?>
        </div>
        <div class="col-xs-6 col-md-4"></div>
        <?php echo form_close(); ?>
    </div>
</div>
<script>

</script>    