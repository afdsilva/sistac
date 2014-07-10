<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>SISTAC - Sistema de Atividades Complementares</title>
  <script src="<?php echo base_url('assets/js/jquery1.11.1.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-ui-1.10.4.custom.min.js') ?>"></script>
  <script src="<?php echo base_url('static/jtable/jquery.jtable.min.js') ?>"></script>
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/ui-lightness/jquery-ui-1.10.4.custom.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
</head>
<body>
  <header id="header" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <nav class="collapse navbar-collapse">
        <ul class="nav nav-pills">
          <li><a href="<?= base_url() ?>"><img src="<?= base_url() ?>static/img/sistac-black.png"></a></li>
          <?php if(isset($logged) && $logged):?>
            <li>
              <a href="<?= base_url() ?>logout" class="glyphicon glyphicon-log-out">&nbsp;Sair&nbsp;</a>
            </li>
            <li>
              <a href="<?= base_url() ?>" class="glyphicon glyphicon-question-sign">&nbsp;Ajuda&nbsp;</a>
            </li>
            <li>
              <a href="<?= base_url() ?>home" class="glyphicon glyphicon-home">&nbsp;Home&nbsp;</a>
            </li>
          <?php else: ?>
            <li>
              <p>
                <a class="btn btn-success" href="cadastrar" style="display: block;">Cadastrar</a>
              </p>
            </li>
            <li>
              <p>
                <a class="btn btn-primary" href="login" style="display: block;">Login</a>
              </p>
            </li>
          <?php endif ?>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container"><!--contaier-->