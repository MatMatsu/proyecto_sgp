<?php
  session_start();
  // Destruyo la sesion para que se borren todos los datos guardados en ella
  session_destroy();

  // Redirijo a la pagina de login
  header('Location: /proyecto_sgp/login.php');
?>