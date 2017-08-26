<?php
	error_reporting(E_ERROR);
	include_once('views/head.php');
	include_once('views/navbar.php');
?>
	<div align="center" style="width:60%" class="col-xs-50 col-sm-0 col-md-50 col-lg-0 well">
        <table style="width:100%" border="3">
          <tr>
            <td  style="width:50%" valign="top">EMPRESA</td>
            <td style="width:50%">FACTURA <br>
              NUMERO: <br>
              FECHA <br>
              CUIT  <br>
             </td>
          </tr>
        </table>
        <table style="width:100%">
          <tr>
            <td style="width:45%" valign="top">
              cliente <b>asd</b>
              <br>domicilio
              <br>etc
            </td>
            <td align="center" valign="top"> cuit  </td>
            <td align="right" valign="top"> forma pago</td>
          </tr>
        </table>
        <table style="width:100%" border="3" bgcolor="black">
          <tr>
            <td style="width:50%">Detalle</td>
            <td style="width:20%">cantidad</td>
            <td style="width:20%">Precio</td>
            <td style="width:10%">Total</td>
          </tr>
        </table>
        <br>
        <table style="width:100%" border="1">
          <tr>
            <td style="width:50%">DetART</td>
            <td style="width:20%">cantART</td>
            <td style="width:20%">PrART</td>
            <td style="width:10%">ImpART</td>
          </tr>
        </table>
        <table style="width:100%" border="3">
          <tr>
            <br>
            <br>
            <td style="width:20%, hight:10px" align"left">
              SUBTOTAL <br>
                DESCUENTO <br>
                IVA ___%
               </td>
            <td style="width:20%"></td>
            <td style="width:60%" valign="top">TOTAL:</td>
          </tr>
        </table>
    <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
  </div>


<?php
  include_once('views/footer.php');
?>
