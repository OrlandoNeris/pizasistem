<?php
  chdir("../../");
  include("includes/inc_clases.php");//arch inclusor de class_exist
  $boton = $_POST['boton'];
  $abm = new cl_abm();

  switch ($boton) {
    case "ingresar":
      echo json_encode($abm->login($_REQUEST["Usuario"], $_REQUEST["Contrasena"]));
    break;
  }

 ?>
