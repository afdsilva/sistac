<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
<?php 
		$title = '';
		if(isset($navigation)) {
			foreach($navigation as $key => $nav)
				if($key != 'aluno') $title = $title . " - ".$nav;
				else  $title = $title . " - Aluno";
		}
?>
        <title>Sistac <?php echo $title;?></title>

        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
    </head>
    <body onload="init();">
        <blockquote>
            <div class="">    
                <div class="blog-header">
                    <h1 style="margin-left: 16">SISTAC</h1>
                    <h4 style="margin-left: 16"><small>Sistema de Atividades Complementares</small></h4>
                </div>
            </div>
        </blockquote>
        <hr>