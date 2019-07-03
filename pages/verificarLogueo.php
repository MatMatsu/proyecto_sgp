<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header('Location: /proyecto_sgp/login.php');
  }
?>