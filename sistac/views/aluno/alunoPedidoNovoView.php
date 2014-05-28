
<div class="container-fluid">
    <div class="row">
        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        echo form_open_multipart('aluno/uploadPedido2/', $attributes);
        ?>
            <?php echo form_label('Upload', 'inputSemestre'); ?>
            <?php echo form_upload('uploadPedido'); ?>
            <?php echo form_submit('upload', 'Enviar'); ?>
            <input type="text" name="codUsuario" id="codUsuario" hidden="false" value="<?php echo $aluno->cpf ?>">
    </div>
</div>

<?php echo form_close(); ?>
