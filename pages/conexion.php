<?php
  /*$hostname = "matmatsu.epizy.com";
  $dbusername = "epiz_24169923";
  $dbpassword = "K0YWSHFBG";*/
  $hostname = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $db = "db_sgp";

  $conexion = mysqli_connect($hostname, $dbusername, $dbpassword, $db);

  if (!$conexion) {
    die("Database connection failed: " . mysqli_connect_error());
  }
?>