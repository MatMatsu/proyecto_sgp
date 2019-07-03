<?php include("./verificarLogueo.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SGP - Registrar Usuario</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/signin.css">
</head>
<body>
	<header>
		<h1>SGP</h1>
		<a href="/proyecto_sgp/pages/logout.php" class="salir">LOGOUT</a>
	</header>
	<main>
		<h2>Registrar usuario nuevo:</h2>
		<?php
			if($_SESSION["username"] == "admin") {
		?>
		<form action="registrarUsuario.php" method="post" id="formRegistro" class="registroUsuario">
			<label for="legajo">Legajo<input type="number" max="999" name="legajo" autofocus="true"></label>
			<label for="usuario">Usuario<input type="text" maxlength="10" name="usuario"></label>
			<label for="password1">Password<input type="password" maxlength="10"></label>
			<label for="password2">Repetir Password<input type="password" maxlength="10" name="password"></label>
			<label for="rol">Seleccionar Rol
				<select name="rol" form="formRegistro">
					<option value="admin">Admin</option>
					<option value="gerente">Gerente</option>
					<option value="deposito">Deposito</option>
					<option value="produccion">Producción</option>
					<option value="matriceria">Matriceria</option>
					<option value="mezclado">Mezclado</option>
					<option value="laboratorio">Laboratorio</option>
				</select>
			</label>
			<input type="submit">
		</form>
		<?php 
			} else {
			 	echo "<p class='youShallNotPass'>NECESITA SER ADMIN PARA INGRESAR AQUÍ</p>";
			}
		?>
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