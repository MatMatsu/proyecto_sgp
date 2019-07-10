<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP</title>
	<link rel="stylesheet" type="text/css" href="../styles/reset.css">
	<link rel="stylesheet" type="text/css" href="../styles/index.css">
</head>
<body>
	<header>
		<h1>SGP</h1>
		<h2>Sistema de Gestión de la Producción</h2>
	</header>
	<main>
		<?php 
      if (isset($_SESSION["message"])) {?> 
      <div class="mensaje" role="alert">
        <?php echo $_SESSION["message"] ?>
      </div>
      <?php
      }
      unset($_SESSION["message"]);
    ?>
		<form action="./validarlogin.php" method="POST" class="logueo col-lg-3 col-md-4 col-sm-6">
			<label for="loginUsuario" class="col-lg-2 col-md-3 col-sm-5">Usuario<input type="text" name="loginUsuario" placeholder="Usuario" maxlength="10" autofocus="true" class="col-lg-2 col-md-3 col-sm-5"></label>
			<label for="loginPassword" class="col-lg-2 col-md-3 col-sm-5">Contraseña<input type="password" name="loginPassword" placeholder="password" maxlength="10" class="col-lg-2 col-md-3 col-sm-5"></label>
			<input type="submit" name="enviar" value="Ingresar">
		</form>

		
	</main>
</body>
</html>