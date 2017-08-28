<?php

	error_reporting(E_ERROR);
	include_once('views/head.php');
	include_once('views/navbar.php');

?>
 <div align="center" style="width:60%" class="col-xs-50 col-sm-0 col-md-50 col-lg-0 well">
	 <table id="numero1" style="width:100%" border="3">

 	</table>
	<table style="width:100%">
		<tr>
			<td id="numero2" style="width:45%" valign="top">
				
			</td>
			<td align="center" valign="top"> cuit
				<br>
				CUITCLIENTE
			</td>
			<td align="right" valign="top"> forma pago
				<br>
				FORMAPAGO
			</td>
		</tr>
	</table>


	<div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
</div>
	<script type="text/javascript">
	// funcion que se inicia luego de cargar la pagina
	$(function () {
		mostrar_factura()
	})
	</script>
<?php
  include_once('views/footer.php');
	?>
