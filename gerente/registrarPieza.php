<?php
  // Obtengo el archivo con la conexion a la base de datos
  require("../pages/conexion.php");

  // Mantengo la sesion abierta
  session_start();

  if($_SESSION["username"] !== "gerente") {
    header("Location: /proyecto_sgp/index.php");
  } else {
    $cod_pza = $_REQUEST["cod_pza"];
    $desc_pza = $_REQUEST["desc_pza"];
    $med_pza = $_REQUEST["med_pza"];
    $peso_pza = $_REQUEST["peso_pza"];
    $tipo_pza = $_REQUEST["tipo_pza"];

    $query = "INSERT INTO piezas (cod_pza, tipo_pza, desc_pza, med_pza, peso_pza) 
      VALUES('" . $cod_pza . "', '" . $tipo_pza . "', '" . $desc_pza . "', '" . $med_pza . "', '" . $peso_pza . "')";

    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
      $_SESSION["message"] = "Pieza registrada exitosamente";
      header('Location: /proyecto_sgp/gerente/registrarPza.php');
    } else {
      $_SESSION["message"] = "Pieza ya existente";
      header('Location: /proyecto_sgp/gerente/registrarPza.php');        
    }
  }
?>