<?php
	session_start();
	if ($_SESSION['logOk'] != 'YES') {
		session_destroy();
		header('Location: index.php');
	}
?>
<?php
	error_reporting(E_ERROR);
	include_once('views/head.php');
?>
<div class="navbar navbar-inverse navbar-fixed-top" rol="navigation">
		<div class="navbar-collapse collapse">
			<div class="container">
				<ul class="nav navbar-nav">
					<a class="dropdown-toggle" data-toggle="dropdown-menu" href="#">
						<i class="glyphicon glyphicon-user"></i>
						Bienvenido: <?= $_SESSION['Usuario'];?>
					  <span class="caret"></span> </a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Cambio contraseña</a></li>
						<li><a href="#"> Darse de baja</a></li>
					</ul>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="javascript: void(0)" onclick='cerrar();'><i class="glyphicon glyphicon-user"></i>Cerrar Session</a></li>
					</li>
				</ul>
				<div class="btn-group">
  				<button type="button" class="btn btn-default dropdown-toggle"
          	data-toggle="dropdown">
    				Título del botón <span class="caret"></span>
  				</button>
  			<ul class="dropdown-menu" role="menu">
    			<li><a href="#">Acción #1</a></li>
    			<li><a href="#">Acción #2</a></li>
    			<li><a href="#">Acción #3</a></li>
    			<li class="divider"></li>
    			<li><a href="#">Acción #4</a></li>
  			</ul>
				</div>
			</div>
		</div>
</div>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LOGIN TEST</title>
	</head>
<body>
