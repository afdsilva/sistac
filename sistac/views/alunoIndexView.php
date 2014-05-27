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
            $this->table->set_template(array('table_open' => '<table class="table table-hover">'));
            $this->table->set_heading(array('Cod', 'Ano', 'Semestre', 'Ações'));
            $this->table->add_row(array(
                isset($pedido->id,$pedido->id),
                isset($pedido->ano,$pedido->ano),
                isset($pedido->semestre,$pedido->semestre),
                form_button(array('name' => 'editar', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => isset($pedido->id,$pedido->id)), 'Editar', 'onClick=') . nbs(2) .
                form_button(array('name' => 'remover', 'type' => 'submit', 'class' => 'btn btn-default', 'value' => isset($pedido->id,$pedido->id)), 'Remover')));
            echo $this->table->generate();
            ?>
        </div>
        <div class="col-xs-6 col-md-4"></div>
        <?php echo form_close(); ?>
    </div>
    <div class="container">
        <div class="row">

            <h4>Certificados: </h4>
            <div class="container">   


                <br />
                <?php echo $erro;?>
                <?= form_open_multipart('aluno/upCertificado'); ?>
                <label for='state'>Atividade </label>
                <input type="text" name="idPedido" id="idPedido" hidden="true" value="<?php echo isset($pedido->id,$pedido->id) ?>">
                <select name='cmbAtividade' id='cmbAtividade'>
                    <option value="0"></option>
                        <?php foreach ($atividades as $atividade) { ?>
                            <option value="<?php echo $atividade->id ?>"> <?php echo $atividade->descricao ?></option>

                        <?php
                    }
                    ?>
                </select>
                <br />

                <input type="file" name="userfile" size="20" />
                <input type="submit" value="upload" />
                </form>
                <div class="row">
                    <h5>Lista Atividades: </h5>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <?php
                        $this->table->set_template(array('table_open' => '<table class="table table-hover">'));
                        $this->table->set_heading(array('Cod', 'Descrição', 'Carga Horaria', 'Tipo Atividade', 'Categoria', 'Arquivo', 'Certificado'
                        ));

                        foreach ($atividades as $atividade) {
                            if ($atividade->arquivoURL != NULL)
                                $this->table->add_row(array(
                                    $atividade->id,
                                    $atividade->descricao,
                                    $atividade->unidadeAtividade,
                                    $atividade->tipoAtividade,
                                    $atividade->categoria,
                                    form_button(array('name' => 'downloadCertificado', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $atividade->id), 'Download', 'onClick="downloadArquivo(\''.$atividade->arquivoURL. ' \')"'),
                                    form_button(array('name' => 'removerAtividade', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $atividade->id), 'Remover', 'onClick="removerCertificado(\''.$atividade->id .','. $atividade->codPedido .'\')"')
                                ));
                        }
                        echo $this->table->generate();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function downloadArquivo(arquivo) {
        window.location = '/sistac/arquivos/'+arquivo;
        $.post('<?= base_url() ?>aluno/download',
                {
                    arquivoURL: '/sistac/arquivos/'+arquivo
                },
        function(data) {
            alert('Sucesso no download');
        });
        
    }

    function removerCertificado(parametros) {
        $.post('<?= base_url() ?>aluno/removerCertificado',
                {
                    idAtividade: parametros[0],
                    idPedido: parametros[2]
                },
        function(data) {
            alert(data);
            window.location.reload();
    });

    }
</script>    