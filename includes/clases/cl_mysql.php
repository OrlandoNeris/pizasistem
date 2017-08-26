<?php
error_reporting(E_ERROR);

class cl_mysql{
  function cl_mysql(){

  }
  //==================
  //	MYSQL CONECTA
  //==================
  function conectar(){
    //entorno raiz
    $ruta = "config/config.php";
    //entorno modulos y elemenots
    $ruta1 = "../../../config/config.php";

			// ENTORNO SERVICIOS
			$ruta2 = "../../config/config.php";

			if( file_exists($ruta) ){
				include( $ruta );
			} else if( file_exists($ruta1) ) {
				include( $ruta1 );
			} else if( file_exists($ruta2) ) {
				include( $ruta2 );
			} else {
				echo "ERROR: No se encontro config.php";
				return false;
			}
			$conn = mysql_connect($host, $user, $pass);

			 mysql_select_db ($bbdd, $conn);

		  return $conn;
		}
	//==================
	//	MYSQL DESCONECTA
	//==================
		function desconectar($conn){
		//	mysql_close ($conn);
		}

}
?>
