<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header('Location: /proyecto_sgp/pages/login.php');
  }
?>