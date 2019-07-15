<?php
  require("../pages/conexion.php");

  session_start();

  if($_SESSION["username"] !== "deposito") {
    header("Location: ../index.php");
  } else {
    $query = "SELECT MAX(id_recepcion) AS ultimaRecepcion FROM recepcion_pzas";

    $resultado = mysqli_query($conexion, $query);
    $id_recepcion = mysqli_fetch_assoc($resultado);
    $id_recepcion['ultimaRecepcion']++;

    $i = 0;

    while($_REQUEST["cod_pza" . $i] != "") {
      $cod_pza = $_REQUEST["cod_pza" . $i];
      $cant_recibida = $_REQUEST["cant_recibida" . $i];

      $query = "INSERT INTO recepcion_pzas (id_recepcion, cod_pza, cant_recibida, fecha_recepcion)
      VALUES('" . $id_recepcion['ultimaRecepcion'] . "', '" . $cod_pza . "', '" . $cant_recibida . "', '" . date("Y-m-d") . "')";

      $resultado = mysqli_query($conexion, $query);

      $i++;
    }

    if ($resultado) {
      $_SESSION["message"] = "Pedido registrado exitosamente";
      header('Location: ../deposito/ingresarRecepcionPza.php');
    } else {
      $_SESSION["message"] = "Error al registrar el pedido";
      header('Location: ../deposito/ingresarRecepcionPza.php');      
      
    }
  }
?>