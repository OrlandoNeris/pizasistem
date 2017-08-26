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
          <legend>Formulario</legend>
          <form id="formulario">
            <table>
              <tr>
                <td><b>Proveedor*:</b></td>
                <td><input type="text" name="prov" ></td>
              </tr>
              <tr>
                <td><b>CUIT*:</b></td>
                <td><input type="text" name="cuit" ></td>
              </tr>
              <tr>
                <td><b>Direcci&oacute;n:</b></td>
                <td><input type="text" name="dir" ></td>
              </tr>
              <tr>
                <td><b>Telef&oacute;no:</b></td>
                <td><input type="text" name="tel" ></td>
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
                <td><b>Antiguedad:</b></td>
                <td><input type="text" name="anti" placeholder="dd/mm/aaaa"></td>
              </tr>
            </table>
            <input type="button" value="Guardar" onclick="guardar();" />
            <input type="button" value="Limpiar"  onclick="limpiar();" />
          </form>
        </fieldset>
      </td>
    </tr>
    </table>

  <input type="button" value="Generar Factura" onclick="factura();" />

  <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
</div>
<?php
  	include_once('views/footer.php');
?>
