<?php
  // Obtengo el archivo con la conexion a la base de datos
  require("conexion.php");
  require("password_compat-master/lib/password.php");

  // Mantengo la sesion abierta
  session_start();

  /** 
   *  Obtengo el valor del campo con name loginuser y loginpassword, que
   *  vienen guardadas en la variable global $_REQUEST, y las asigno
   *  a las variables $username y $password
   */
  $username = $_REQUEST["loginUsuario"];
  $password = $_REQUEST["loginPassword"];
  
  /** 
   * Creo una query para buscar un usuario con ese username
   * SELECT *                         trae todas las columnas
   * FROM usuarios                    busca en la tabla usuarios
   * WHERE username LIKE $username    restrinjo la busqueda al registro cuyo columna
   * username tenga el valor de la variable $username
   */ 
  $query = 'SELECT * FROM users WHERE name LIKE "' . $username . '" LIMIT 1';
  
  // Ejecuto la query y la guardo en la variable $resultado
  $resultado = mysqli_query($conexion, $query);

  // Obtengo el primer registro del resultado de la busqueda
  $usuario = mysqli_fetch_array($resultado);

  // Comparo la contraseña que proveyo el usuario con la que hay guardada en la base de datos
  if (password_verify($password, $usuario['password'])) {
    // Si coinciden, guardo en sesion los datos del usuario
    $_SESSION["username"] = $username;
    
    // Por las dudas de que haya habido una sesion previa, borramos con unset
    // los datos guardados en la sesion de la comunidad seleccionada previamente
    $_SESSION["message"] = "";
    // Redirijo a home
    header('Location: /sgp/home.php');
  } else {
    // Si no coinciden, guardo un mensaje en sesion y redirijo a login
    $_SESSION["message"] = "Usuario o contraseña incorrectos ";

    header('Location: /sgp/login.php');
  }
?>