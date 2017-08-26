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
					<fieldset>
						<legend>Filtros</legend>
						Productos <input type="text" name="prov_fil" ><br>
						<input type="button" value="Buscar"  onclick="buscar();" />
					</fieldset>
					<img src="img/ajax-loader.gif" id="load_image" style="display:none;">
					<table style="width:100%">
						<thead>
							<tr>
								<td>Proveedor</td><td>Cuit</td><td>Tipo</td><td>Antiguedad</td>
							</tr>
						</thead>
						<tbody id="lista">
						</tbody>
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
								<td><b>Tipo*:</b></td>
								<td>
									<select id="tipo" name="tipo">
										<option value=0>-Tipo-</option>
									</select>
								</td>
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

  <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
</div>
<?php
  	include_once('views/footer.php');
?>
