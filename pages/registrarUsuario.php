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

    // Encripto la contraseña (no la guardamos tal cual esta, sino que la encriptamos impedir que pueda verse cual es)
    $hash = password_hash($password, PASSWORD_BCRYPT);
    
    /**  
     * Creo una query para insertar en la tabla usuarios un nuevo
     * registro con los valores de las variables $username y $password
     */ 
    $query = "INSERT INTO users(legajo, name, password) 
      VALUES('" . $legajo . "', '" . $username . "', '" . $hash . "')";

    // Ejecuto la query y guardo el resultado en la variable $resultado
    $resultado = mysqli_query($conexion, $query);


    if ($resultado) {
      $query = "INSERT INTO roles(legajo, rol) 
        VALUES('" . $legajo . "', '" . $rol . "')";

      $resultado = mysqli_query($conexion, $query);
      /**
        * Si el resultado esta bien, guardamos en nombre de usuario en sesion,
        * tambien guardamos el id del usuario recien creado en sesion.
        * Por las dudas de que haya habido una sesion previa, borramos con unset
        * los datos guardados en la sesion de la comunidad seleccionada previamente
        * Y luego redirigimos a home
      */
      if($resultado) {
        $_SESSION["message"] = "Usuario registrado exitosamente";
        header('Location: /proyecto_sgp/pages/registrarUser.php');
      } else {
        $_SESSION["message"] = "Rol no asignado";
        header('Location: /proyecto_sgp/pages/registrarUser.php');
      }
    } else {
      /**
       * Si el resultado esta mal, es muy probable que el usuario que se este
       * intentando crear ya existe. Como en la tabla el campo esta definido como UNIQUE,
       * no puede haber dos iguales, por lo tanto si pasa eso nos va a tirar un error
       * En ese caso lo que hacemos es guardar en session un mensaje informando tal cosa
       * y redirijo a login
       */
      $_SESSION["message"] = "Usuario ya existente";
      header('Location: /proyecto_sgp/pages/registrarUser.php');        
    }
  }

?>