<?php

	error_reporting(E_ERROR);
	include_once('views/head.php');
	include_once('views/navbar.php');

	?>
	<?php
	//parte guiso -solo de test-
		$iva = 0.21;
		$totaliva = 0;
		$host="localhost";
		$bbdd="usertest";
		$user="root";
		$pass="qweasd";
		$conexion=new mysqli($$host,$user,$pass,$bbdd);
		$registros=mysqli_query($conexion,"SELECT id, Tipo FROM Factura") or
		die("error:".mysqli_error($conexion));
		$reg=mysqli_fetch_array($registros)
//parte guiso -solo de test-
	 ?>


 <div align="center" style="width:60%" class="col-xs-50 col-sm-0 col-md-50 col-lg-0 well">
        <table style="width:100%" border="3">
          <tr>
            <td  style="width:50%" valign="top">EMPRESA
							<br>
						 <p align="center"> Pizeria Lo Vago SA</p>
						</td>
            <td style="width:50%">TIPO FACTURA: <br>
              NUMERO: <br>
              FECHA: <br>
              CUIT: MICUIT  <br>
             </td>
          </tr>
        </table>
        <table style="width:100%">
          <tr>
            <td style="width:45%" valign="top">
              cliente <b>NOMBRE CLIENTE</b>
              <br>domicilioCLIENTE
              <br>LUGARYFECHAEMISION:
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
                IVA ___% <?php echo "hola $reg[0], $reg[1]"; ?>
               </td>
            <td style="width:20%">
							SUBTOTAL <br>
							descuento <br>
							iva
						</td>
            <td style="width:60%" valign="top">TOTAL:
							<br>
						 <p align="center"> TOTAL</p>
						</td>
          </tr>
        </table>
    <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
  </div>
<?php
  include_once('views/footer.php');
	?>
