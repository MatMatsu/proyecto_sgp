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
    $username = $_REQUEST["usuario"];
    $password = $_REQUEST["password"];
    $rol = $_REQUEST["rol"];

    $query = 'SELECT * FROM users WHERE legajo LIKE "' . $legajo . '" LIMIT 1';
    $resultado = mysqli_query($conexion, $query);
    $usuario = mysqli_fetch_array($resultado);

    // Encripto la contraseña (no la guardamos tal cual esta, sino que la encriptamos impedir que pueda verse cual es)
    if ($password != $usuario['password']) {
      $hash = password_hash($password, PASSWORD_BCRYPT);
      $query = "UPDATE users SET name = '" . $username . "', password = '" . $hash . "' WHERE legajo = " . $legajo;
    } else {
      $query = "UPDATE users SET name = '" . $username . "' WHERE legajo = " . $legajo;
    }

    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
      $query = "UPDATE roles SET rol = '" . $rol . "' WHERE legajo = " . $legajo;

      $resultado = mysqli_query($conexion, $query);
      /**
        * Si el resultado esta bien, guardamos en nombre de usuario en sesion,
        * tambien guardamos el id del usuario recien creado en sesion.
        * Por las dudas de que haya habido una sesion previa, borramos con unset
        * los datos guardados en la sesion de la comunidad seleccionada previamente
        * Y luego redirigimos a home
      */
      if($resultado) {
        $_SESSION["message"] = "Usuario modificado exitosamente";
        header('Location: /proyecto_sgp/pages/home.php');
      } else {
        $_SESSION["message"] = "No se pudo modificar al usuario";
        header('Location: /proyecto_sgp/pages/home.php');
      }
    } else {
      /**
       * Si el resultado esta mal, es muy probable que el usuario que se este
       * intentando crear ya existe. Como en la tabla el campo esta definido como UNIQUE,
       * no puede haber dos iguales, por lo tanto si pasa eso nos va a tirar un error
       * En ese caso lo que hacemos es guardar en session un mensaje informando tal cosa
       * y redirijo a login
       */
      $_SESSION["message"] = "No se pudo modificar al usuario";
      header('Location: /proyecto_sgp/pages/home.php');
    }
  }
?>