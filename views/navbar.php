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
	include_once('css')
?>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/simple-sidebar.css" rel="stylesheet">
<div class="navbar navbar-inverse navbar-fixed-top" rol="navigation">
		<div class="navbar-collapse collapse">
			<div class="container">
				<ul class="nav navbar-nav">
					<a  href="#">
						<i class="glyphicon glyphicon-user"></i>
						Bienvenido: <?= $_SESSION['Usuario'];?>
					  <span class="caret"></span> </a>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="javascript: void(0)" onclick='cerrar();'><i class="glyphicon glyphicon-user"></i>Cerrar Session</a></li>
					</li>
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
	<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
							<li class="sidebar-brand">
									<a href="#">
											Start Bootstrap
									</a>
							</li>
							<li>
									<a href="venta_factura.php">Venta</a>
							</li>
							<li>
									<a href="abm_provedor.php">ABM </a>
							</li>
							<li>
									<a href="factura.php">Facturas emitidas</a>
							</li>
							<li>
									<a href="#">Events</a>
							</li>
							<li>
									<a href="#">About</a>
							</li>
							<li>
									<a href="#">Services</a>
							</li>
							<li>
									<a href="#">Contact</a>
							</li>
					</ul>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">
					<div class="container-fluid">
							<br>
							<br>
							<h1>Menú de opciones</h1>
							<p> Pulse el menú para ir  a las ABM, ver facturas o estados, cambiar datos de su cuenta.-</p>
							<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu de Opciones</a>
					</div>
			</div>
			<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/popper/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Menu Toggle Script -->
	<script>
	$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
	});
	</script>
