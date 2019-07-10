<?php
  session_start();
  if(isset($_SESSION["username"])){
    header('Location: /proyecto_sgp/pages/home.php');
  } else {
    header('Location: /proyecto_sgp/pages/login.php');
  }
?>