<?php
  // Obtengo el archivo con la conexion a la base de datos
  require("../pages/conexion.php");

  // Mantengo la sesion abierta
  session_start();

  if($_SESSION["username"] !== "gerente") {
    header("Location: /proyecto_sgp/index.php");
  } else {

    /** 
     *  Obtengo el valor del campo con name user y password, que
     *  vienen guardadas en la variable global $_REQUEST, y las asigno
     *  a las variables $username y $password
     */
    $cod_pza = $_REQUEST["cod_pza"];
    $desc_pza = $_REQUEST["desc_pza"];
    $med_pza = $_REQUEST["med_pza"];
    $peso_pza = $_REQUEST["peso_pza"];
    $tipo_pza = $_REQUEST["tipo_pza"];

    // Encripto la contraseña (no la guardamos tal cual esta, sino que la encriptamos impedir que pueda verse cual es)
    $query = 'UPDATE piezas SET tipo_pza = "' . $tipo_pza . 
                  '", desc_pza = "' . $desc_pza . 
                  '", med_pza = "' . $med_pza .
                  '", peso_pza = "' . $peso_pza .
                  '" WHERE cod_pza = "' . $cod_pza . '"';

    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
      $_SESSION["message"] = "Pieza modificada exitosamente";
      header('Location: /proyecto_sgp/pages/home.php');
    } else {
      $_SESSION["message"] = "No se pudo modificar la pieza";
      //header('Location: /proyecto_sgp/pages/home.php');
      echo $query;
    }
  }
?>