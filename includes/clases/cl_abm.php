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
      case 'factura':
        echo TRUE;
        break;
      case 'num_factura':
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
         $ultimo += 1;
         echo $ultimo;
         break;
      //case 'buscar':
        //$data = array( "total"=>0, "paginas"=>0, "registros"=>array() );
        //$cantidad = 10;

    }
 ?>
