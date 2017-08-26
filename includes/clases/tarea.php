<?php
  require("../../config/config.php");
  $Usuario = "test";
  $Contrasena = "testing";
  $result = mysqli_query($conexion,"SELECT * FROM Usuario WHERE Usuario='$Usuario' AND Contrasena='$Contrasena';");
  if($Usua=mysqli_fetch_array($result)){
    session_start();
    $_SESSION['Id']=$Usua[0];
    $_SESSION['Usuario']=$Usua[1];
    $mensajeError='Logueado correctamente ok.';
    $logok = TRUE;
  }else{

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
      );
    }
    session_destroy();
    $mensajeError='Usr o pass erronea';

  };
  echo $mensajeError;
  echo $_SESSION['Id'];
  echo $_SESSION['Usuario'];
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
