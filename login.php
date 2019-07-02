<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP</title>
	<link rel="stylesheet" type="text/css" href="./styles/reset.css">
	<link rel="stylesheet" type="text/css" href="./styles/index.css">
</head>
<body>
	<header>
		<h1>SGP</h1>
		<h2>Sistema de Gestión de la Producción</h2>
	</header><!-- /header -->
	<main>
		<form action="./pages/validarlogin.php" method="POST" class="logueo">
			<label for="loginUsuario">Usuario<input type="text" name="loginUsuario" placeholder="Usuario" maxlength="10" autofocus="true"></label>
			<label for="loginPassword">Contraseña<input type="password" name="loginPassword" placeholder="password" maxlength="10"></label>
			<input type="submit" name="enviar" value="Ingresar">
		</form>

		<?php 
      if (isset($_SESSION["message"])) {?> 
      <div class="" role="alert">
        <?php echo $_SESSION["message"] ?>
      </div>
      <?php
      }
    ?>
	</main>
</body>
</html>