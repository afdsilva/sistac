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
  <link href="<?php echo base_url('assets/css/social-buttons-3.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/social-buttons.css') ?>" rel="stylesheet">
</head>
<body>
  <header id="header" class="">
    <div class="container-fluid navbar navbar-default navbar-static-top">
      <nav class="collapse navbar-collapse" style="display: block !important;">
        <ul class="nav nav-pills">
          <li><a href="<?= base_url() ?>"><img src="<?= base_url() ?>static/img/sistac-black.png"></a></li>
          <?php if(isset($logged) && $logged):?>
            <li>
              <a href="<?= base_url() ?>logout" class="glyphicon glyphicon-log-out">&nbsp;Sair</a>
            </li>
            <li>
              <a href="<?= base_url() ?>" class="glyphicon glyphicon-question-sign">&nbsp;Ajuda</a>
            </li>
            <li>
              <a href="<?= base_url() ?>home" class="glyphicon glyphicon-home">&nbsp;Home</a>
            </li>
          <?php else: ?>
            <li>
              <a class="glyphicon glyphicon-user" href="<?= base_url() ?>cadastrar">&nbsp;Cadastrar</a>
            </li>
            <li>
              <a class="glyphicon glyphicon-lock" href="<?= base_url() ?>login">&nbsp;Login</a>
            </li>
          <?php endif ?>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container" id="container"><!--contaier-->