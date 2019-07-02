<?php
  // Destruyo la sesion para que se borren todos los datos guardados en ella
  session_destroy();

  unset($_COOKIE["username"]);

  // Redirijo a la pagina de login
  header('Location: /proyecto_sgp/login.php');
?>