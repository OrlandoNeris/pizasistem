<?php
  require("../../config/config.php");
  //extiende de la clase mysql asi no tngo q instanciarla
  //la clase mysql conecta a la base
    $boton=$_POST['boton'];

    switch ($boton) {
      case 'ingresar':
        $Usuario = $_POST['Usuario'];
        $Contrasena =$_POST['Contrasena'];
        $logok = FALSE;
        $result = mysqli_query($conexion,"SELECT * FROM Usuario WHERE Usuario ='$Usuario' AND Contrasena='$Contrasena';");
        if($Usua=mysqli_fetch_array($result)){
          session_start();
          $_SESSION['Id']=$Usua[0];
          $_SESSION['Usuario']=$Usua[1];
          $_SESSION['logOk']='YES';
          $mensajeError='Logueado correctamente ok.';
          $logok = TRUE;
          echo $logok;
        }else{
          echo $logok;
        };
        break;
      case 'cerrar':
        session_start();
        if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
          );
        }
        session_destroy();
        echo TRUE;
        break;
      case 'agregar':
        $id_producto = $_POST['id_prod'];
        $cant = $_POST['Cantidad'];
        $num_factura = $_POST['num_factura'];
        if($id_producto > 0 && $cant > 0){
          $result = mysqli_query($conexion,"SELECT stock, CostoProducto, Id FROM Producto WHERE Id ='$id_producto';");
          $reg_producto = mysqli_fetch_array($result);
          if ($cant > $reg_producto[0] ){
            echo "stock insuficiente";
          }else {
            $stock_actual = $reg_producto[0] - $cant;
            mysqli_query($conexion, "UPDATE Producto SET Stock ='$stock_actual' WHERE Id = '$id_producto';") or
              die("Problemas en el select:".mysqli_error($conexion));
            //agregar a detalle factura
            mysqli_query($conexion, "INSERT INTO DetalleFactura (Id, NroComprobante, IdProducto, Cantidad, Precio) VALUES(NULL, '$num_factura','$reg_producto[2]','$cant','$reg_producto[1]');");
            echo "Ok";
          };
        }else {
          echo "Debe rellenar los campos";
        }
        break;
        case 'factura':
          $fecha = $_POST['fecha'];
          $ff= explode("/",$fecha);
          $cli = $_POST['cliente'];
          $dir = $_POST['dir'];
          $formapago = $_POST['formapago'];
          $num_factura = $_POST['num_factura'];
          $tipo_factura = $_POST['tipo_factura'];
          $descuento = $_POST['Descuento'];
          $no_vacio = strlen($fecha) * strlen($cli) * strlen($dir) * strlen($formapago) * strlen($num_factura) * strlen($tipo_factura);
          if ($no_vacio > 0 ){
            $result = mysqli_query($conexion,"SELECT * FROM Persona WHERE Nombre ='$cli';");
            if($reg_cli = mysqli_fetch_array($result)){
              mysqli_query($conexion, "INSERT INTO Factura (Id, Tipo, FormaPago, Persona, NroComprobante, Fecha, Iva, Descuento) VALUES(NULL, '$tipo_factura','$formapago','$reg_cli[0]','$num_factura','".$ff[2]."-".$ff[1]."-".$ff[0]."','0.21','$descuento');");
              echo 9;
            }else {
              echo "no existe cliente";
            };
          }else {
            echo "debe rellenar campos";
          };
          break;
      case 'num_factura': //busco numero de factura
         echo ulti_factura();
         break;
      case 'buscar':
        $Buscar = $_POST['Buscar'];
        $registros=mysqli_query($conexion,"SELECT Id, NombreProducto, Stock FROM Producto WHERE NombreProducto = '$Buscar' AND Stock > 0;") or
          die("Problemas en el select:".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros)){
          $datos[] = array("id" => $reg[0], "ProdNombre" => $reg[1]);
          echo json_encode($datos);
        }else {
          echo FALSE;
        }
        break;
      case 'factura_ya':
        $ulti = ulti_factura();
        $ulti -= 1;
        $registros=mysqli_query($conexion,"SELECT * FROM Factura WHERE NroComprobante = '$ulti';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_factura=mysqli_fetch_array($registros);

        $registros=mysqli_query($conexion,"SELECT * FROM Persona WHERE Id = '$reg_factura[3]';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_persona=mysqli_fetch_array($registros);

        $registros=mysqli_query($conexion,"SELECT * FROM DetalleFactura WHERE NroComprobante = '$ulti';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_detalle=mysqli_fetch_array($registros);

        $registros=mysqli_query($conexion,"SELECT NombreProducto FROM Producto WHERE Id = '$reg_detalle[2]';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_prod =mysqli_fetch_array($registros);


          $datos[] = array("tipo" => $reg_factura[1], "numero" => $ulti, "fecha" => $reg_factura[5], "formapago" => $reg_factura[2],
          "nombre_persona" => $reg_persona[2], "direccion" => $reg_persona[4], "cuit" => $reg_persona[5], "cantidad" => $reg_detalle[3], "precio" => $reg_detalle[4], "nombre_producto" => $reg_prod[0],
           "forma_pago" => $reg_factura[2]);
          echo json_encode($datos);
        break;


    }
    function ulti_factura(){
      require("../../config/config.php");
      $registros=mysqli_query($conexion,"SELECT NroComprobante FROM Factura;") or
        die("Problemas en el select:".mysqli_error($conexion));
       $reg=mysqli_fetch_array($registros);
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
       $ultimo += 1;   //aumento en 1 cada vez q llamo//
       return $ultimo;
     }
 ?>
