<?php
  require("../../config/config.php");
  $Buscar = "Coca";
  $reult=mysqli_query($conexion,"SELECT Id, NombreProducto FROM Producto WHERE NombreProducto = '$Buscar';") or
    die("Problemas en el select:".mysqli_error($conexion));
  while( $reg = mysql_fetch_assoc( $result ) ){//recorro los datos y los almaceno
    echo $data[1];
    $data[] = $reg;
  }
  echo $data[1];

  /*

  $registros=mysqli_query($conexion,"SELECT NroComprobante FROM Factura;") or
    die("Problemas en el select:".mysqli_error($conexion));
   $reg=($reg=mysqli_fetch_array($registros));
   $ultimo = $reg[0];
   while ($reg=mysqli_fetch_array($registros))
   {
     if ($ultimo < $reg[0]){
         $ultimo = $reg[0];
     }
   }
   if($ultimo == 0){
     $ultimo = 1;
   }
   echo $ultimo +1 ;
   */
    /*

    $Usua=mysqli_fetch_array($result);
    session_start();
    $_SESSION['Id']=$Usua[0];
    $_SESSION['Usuario']=$Usua[1];
    $mensajeError='Logueado correctamente ok.';
    $logok = TRUE;
    echo "paso";
    console.log("paso");

  else:
    echo 'Usr o pass erronea';
    //7echo "fail";
    //console.log("fail");
    */

 ?>
