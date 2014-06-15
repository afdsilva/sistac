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

                    </ul>
                    <div class="pull-right">
                        <a href="<?= base_url() ?>"> <span class="glyphicon glyphicon-home"></span> Home </a>
                        <a href="<?= base_url() ?>"> <span class="glyphicon glyphicon-question-sign"></span> Ajuda </a>
                        <a href="<?= base_url() ?>"> <span class="glyphicon glyphicon-log-out"></span> Sair </a>
                    </div>
                </nav>
            </div>
        </header>

        <div class="container"><!--contaier-->