<?php include("./verificarLogueo.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - Registrar Usuario</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("./header.php"); ?>
	<main>
		<h2>Registrar usuario nuevo:</h2>
		<?php 
      if (isset($_SESSION["message"])) {?> 
      <div class="mensaje" role="alert">
        <?php echo $_SESSION["message"] ?>
      </div>
      <?php
      }
      unset($_SESSION["message"]);
    ?>
		<?php
			if($_SESSION["username"] == "admin") {
		?>
		<form action="registrarUsuario.php" method="post" id="formRegistro" autocomplete="nope" class="registroUsuario col-lg-5 col-md-7 col-sm-9">
			<label for="legajo" class="col-lg-2 col-md-3 col-sm-7">Legajo<input type="number" max="999" name="legajo" autofocus="true" class="col-lg-2 col-md-3 col-sm-5" id="legajo" required="true"></label>
			<label for="usuario" class="col-lg-2 col-md-3 col-sm-7">Usuario<input type="text" maxlength="10" name="usuario" class="col-lg-2 col-md-3 col-sm-5" id="usuario" required="true"></label>
			<label for="password1" class="col-lg-2 col-md-3 col-sm-7">Password<input type="password" maxlength="10" class="col-lg-2 col-md-3 col-sm-5" id="pass1" required="true"></label>
			<label for="password2" class="col-lg-2 col-md-3 col-sm-7">Repetir Password<input type="password" maxlength="10" name="password" class="col-lg-2 col-md-3 col-sm-5" id="pass2" required="true"></label>
			<label for="rol" class="col-lg-5 col-md-7 col-sm-9">Seleccionar Rol
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
			<input type="submit" value="REGISTRAR USUARIO" class="btnAdmin">
		</form>
		<div class="contenedor">
			<div class="registrarUsuario">
				<a href="./home.php">VOLVER</a>
			</div>
		</div>
		<?php 
			} else {
			 	echo "<p class='youShallNotPass'>NECESITA SER ADMIN PARA INGRESAR AQUÍ</p>";
			}
		?>
	</main>
	<?php include("./scriptJs.php"); ?>
</body>
</html>