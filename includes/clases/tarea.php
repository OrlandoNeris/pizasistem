<?php
  require("../../config/config.php");
  $data = array( "total"=>0, "paginas"=>0, "registros"=>array() );
  $cantidad = 10;
  $sql ="SELECT SQL_CALC_FOUND_ROWS * FROM Producto ORDER BY NombreProducto LIMIT ".$pagina*$cantidad.",".$cantidad." ";
  $result=mysqli_query($conexion, $sql);
  $result_total = mysqli_query('SELECT FOUND_ROWS() as total');
  $reg = mysql_fetch_assoc( $result_total );
  $data["total"] = $reg["total"];
  $data["paginas"] = ceil( $reg["total"]/$cantidad );

  while( $reg = mysql_fetch_assoc( $result ) ){//recorro los datos y los almaceno
    $data["registros"][] = $reg;
  }
  echo $data[2];

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
