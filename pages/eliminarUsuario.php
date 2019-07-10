<?php
  // Obtengo el archivo con la conexion a la base de datos
  require("conexion.php");
  //PARA PODER USAR HASH EN UN PHP MAS VIEJO
  //require("password_compat-master/lib/password.php");

  // Mantengo la sesion abierta
  session_start();

  if($_SESSION["username"] !== "admin") {
    header("Location: /proyecto_sgp/index.php");
  } else {

    /** 
     *  Obtengo el valor del campo con name user y password, que
     *  vienen guardadas en la variable global $_REQUEST, y las asigno
     *  a las variables $username y $password
     */
    $legajo = $_REQUEST["legajo"];

    $query = 'DELETE FROM users WHERE legajo = ' . $legajo;
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado) {
      $_SESSION["message"] = "Usuario eliminado exitosamente";
      header('Location: /proyecto_sgp/pages/home.php');
    } else {
      $_SESSION["message"] = "No se pudo eliminar al usuario";
      header('Location: /proyecto_sgp/pages/home.php');
    }
  }
?>