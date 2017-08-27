<?php
	error_reporting(E_ERROR);
	include_once('views/head.php');
	include_once('views/navbar.php');
?>
<div class="col-xs-0 col-sm-0 col-md-0 col-lg-0 well">
  <table style="width:100%">
    <tr>
      <td style="width:50%" valign="top">
					<fieldset>
						<legend>Filtros</legend>
						<form id="busqueda">
						Productos <input type="text" name="Buscar" id="Buscar" >
						<input type="button" value="Buscar"  onclick="buscar();" />
					<table style="width:100%">
						<thead>
							<tr>
									<tr>
										<td><b>Id Producto:</b></td>
										<td><input type="text" name="idprod"></td>
									</tr>
									<tr>
										<td><b>Nombre producto:</b></td>
										<td><input type="text" name="nombreproducto"></td>
									</tr>
									<tr>
										<td><b>Cantidad </b></td>
										<td><input type="text" name="Cantidad" value="0"></td>
									</tr>
								</form>
							</tr>
						</thead>
					</table>
						<div id="paginas"></div>
					<div id="navegador"></div>
				</fieldset>
      </td>
			<td style="width:50%" valign="top">
				<fieldset>
					<legend>Formulario Venta</legend>
					<form id="formulario">
						<table>
							<tr>
								<td><b>fecha:</b></td>
								<td><input type="text" name="anti" placeholder="dd/mm/aaaa"></td>
							</tr>
							<tr>
								<td><b>Señor(es):</b></td>
								<td><input type="text" name="prov" ></td> <!--cliente -->
							</tr>
							<tr>
								<td><b>Direcci&oacute;n de emisi&oacute;n:</b></td>
								<td><input type="text" name="dir" ></td>					<!--lugar de emision -->
							</tr>
							<tr>
								<td><b>Forma de pago</b></td>
								<td><input type="text" name="formapago" ></td>
							</tr>
							<tr>
								<td><b>Numero Factura:</b></td>
								<td><input type="text" name="num_factura"></td>
							</tr>
							<tr>
								<td><b>Tipo Factura</b></td>
								<td>
									<select name="tipofactura">
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="X">X</option>
									</select>
								</td>
							</tr>
						</table>
						<input type="button" value="Guardar" onclick="guardar();" />
						<input type="button" value="Limpiar"  onclick="limpiar();" />
						<input type="button" value="Generar Factura" onclick="factura();" />
					</form>
				</fieldset>
			</td>
		</tr>
    </table>
		<script type="text/javascript">
		// funcion que se inicia luego de cargar la pagina
		$(function () {
			getNumeroFactura();
			//buscar();
		})
		</script>
  <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
</div>
<?php
  	include_once('views/footer.php');
?>
