<?php
  require("../pages/conexion.php");

  session_start();

  if($_SESSION["username"] !== "gerente") {
    header("Location: ../index.php");
  } else {

    $cod_pza = $_REQUEST["cod_pza"];

    $query = 'DELETE FROM piezas WHERE cod_pza = "' . $cod_pza . '"';
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado) {
      $_SESSION["message"] = "Pieza eliminada exitosamente";
      header('Location: ../pages/home.php');
    } else {
      $_SESSION["message"] = "No se pudo eliminar la pieza";
      header('Location: ../pages/home.php');
    }
  }
?>