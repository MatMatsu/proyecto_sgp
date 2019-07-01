<?php
  session_start();
  if(isset($_SESSION["username"])){
    header('Location: /sgp/home.php');
  } else {
    header('Location: /sgp/login.php');
  }
?>