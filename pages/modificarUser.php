<?php include("./verificarLogueo.php") ?>
<?php
	require("conexion.php");

	$query = 'SELECT users.legajo, users.name, users.password, roles.rol FROM users INNER JOIN roles on users.legajo = roles.legajo WHERE users.legajo = ' . $_GET["legajo"];

	if($resultado = mysqli_query($conexion, $query)) {
		$usuario = mysqli_fetch_assoc($resultado);
	}
?>
<!DOCTYPE html>
<html lang="en">
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
		<h2>Modificar usuario:</h2>
		<?php if($_SESSION["username"] == "admin") { ?>
		<form action="modificarUsuario.php" method="post" id="formRegistro" class="registroUsuario col-lg-5 col-md-7 col-sm-9">
			<label for="legajo" class="col-lg-2 col-md-3 col-sm-7">Legajo<input type="number" max="999" name="legajo" autofocus="true" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo $usuario["legajo"]; ?> ></label>
			<label for="usuario" class="col-lg-2 col-md-3 col-sm-7">Usuario<input type="text" maxlength="10" name="usuario" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo "'" . $usuario["name"] . "'"; ?> ></label>
			<label for="password1" class="col-lg-2 col-md-3 col-sm-7">Password<input type="password" maxlength="10" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo "'" . $usuario["password"] . "'"; ?> ></label>
			<label for="password2" class="col-lg-2 col-md-3 col-sm-7">Repetir Password<input type="password" maxlength="10" name="password" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo "'" . $usuario["password"] . "'"; ?> ></label>
			<label for="rol" class="col-lg-5 col-md-7 col-sm-9">Seleccionar Rol
				<select name="rol" form="formRegistro">
					<option value="admin" <?php if($usuario["rol"] == "admin") echo 'selected="selected"'; ?> >Admin</option>
					<option value="gerente" <?php if($usuario["rol"] == "gerente") echo 'selected="selected"'; ?> >Gerente</option>
					<option value="deposito" <?php if($usuario["rol"] == "deposito") echo 'selected="selected"'; ?> >Deposito</option>
					<option value="produccion" <?php if($usuario["rol"] == "produccion") echo 'selected="selected"'; ?> >Producción</option>
					<option value="matriceria" <?php if($usuario["rol"] == "matriceria") echo 'selected="selected"'; ?> >Matriceria</option>
					<option value="mezclado" <?php if($usuario["rol"] == "mezclado") echo 'selected="selected"'; ?> >Mezclado</option>
					<option value="laboratorio" <?php if($usuario["rol"] == "laboratorio") echo 'selected="selected"'; ?> >Laboratorio</option>
				</select>
			</label>
			<input type="submit" value="Modificar" class="btnAdmin">
		</form>
		<div class="contenedor">
			<div class="registrarUsuario">
				<a href="./home.php">CANCELAR</a>
			</div>
		</div>
		<?php } ?>
	</main>
</body>
</html>