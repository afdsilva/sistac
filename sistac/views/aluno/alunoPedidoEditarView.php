<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="form-group">
                <?php echo form_label('Ano', 'inputAno', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'inputAno', 'placeholder' => 'Ano'), $pedido->ano); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Semestre', 'inputSemestre', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Semestre'), $pedido->semestre); ?>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">

            <h4>Certificados: </h4>
            <div class="container">   


                <br />
                <?php echo $erro; ?>
                <?= form_open_multipart('aluno/inserirCertificado'); ?>
                <label for='state'>Atividade </label>
                <input type="text" name="idPedido" id="idPedido" hidden="true" value="<?php echo $pedido->id ?>">
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
                            //if ($atividade->arquivoURL != NULL)
                            $this->table->add_row(array(
                                $atividade->id,
                                $atividade->descricao,
                                $atividade->unidadeAtividade,
                                $atividade->tipoAtividade,
                                $atividade->categoria,
                                form_button(array('name' => 'visualizarCertificado', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $atividade->id), 'Visualizar', 'onClick="visualizarCertificado(\'' . $atividade->arquivoURL . ' \')"'),
                                form_button(array('name' => 'removerCertificado', 'type' => 'button', 'class' => 'btn btn-default', 'value' => $atividade->id), 'Remover', 'onClick="removerCertificado(\'' . $atividade->id . ',' . $atividade->codPedido . '\')"')
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


        function visualizarCertificado(arquivo) {
            window.location = '/sistac/arquivos/' + arquivo;
            $.post('<?= base_url() ?>aluno/download',
                    {
                        arquivoURL: '/sistac/arquivos/' + arquivo
                    },
            function(data) {
                alert('Sucesso no download');
            });

        }

        function removerCertificado(parametros) {

            var temp = parametros.split(',');
            $.post('<?= base_url() ?>aluno/removerCertificado',
                    {
                        idAtividade: temp[0],
                        idPedido: temp[1]
                    },
            function(data) {
                if (data == 'sucesso'){
                    alert("Arquivo removido com sucesso!");
                    window.location.reload();
                } else {
                    alert("Houve uma falha, tente novamente");
                    window.location.reload();
                }
            });

        }

    </script>