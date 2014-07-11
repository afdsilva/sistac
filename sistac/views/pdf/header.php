<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
	<meta http-equiv="Content-Type" content="charset=utf-8" /> 
  <style type="text/css"> 
    * {
    	text-align: left;
	    font-family:"Arial", sans-serif;
	    font-size: 16px;
	  }

	  #header-logo {
	  	width: 100px;
	  	height: 100px;
	  }

	  #header-text {
	  	width: auto;
	  	height: 100px;
	  	line-height: 33px;
	  	padding: 0;
	  	margin: 0 0 0 20px;
	  	font-size: 20px;
	  }

	  #report, .title {
	  	width: 100%;
	  	height: 30px;
	  	line-height: 30px;
	  	text-align: center;
	  	vertical-align: middle;
	  	font-weight: bold;
	  }

	  #report {
	  	border: 1px solid black;
	  	margin: 50px 0;
	  	font-size: 20px;
	  }

	  .title {
	  	margin-bottom: 10px;
	  	font-size: 30px;
	  }

	  .table {
	  	width: 100%;
	  	margin-top: 50px;
	  }

	  .table th, .table td {
	  	text-align: center;
	  }
  </style>
</head> 
<body>
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td><img id="header-logo" src="static/img/ufpel.png"></td>
			<td valign="middle"><p id="header-text">Universidade Federal de Pelotas<br>Curso de <?php echo $curso; ?><br>Sistac - Sistema de Atividades Complementares</p></td>
		</tr>
	</table>

	<div id="report">Relatório</div>