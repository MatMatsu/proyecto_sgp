<?php
	session_start();

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
	<title>SGP - Registrar Usuario</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/signin.css">
</head>
<body>
	<header>
		<h1>SGP</h1>
	</header>
	<main>
		<h2>Registrar usuario nuevo:</h2>
		<form action="modificarUsuario.php" method="post" id="formRegistro" class="registroUsuario">
			<label for="legajo">Legajo<input type="number" max="999" name="legajo" autofocus="true" value=<?php echo $usuario["legajo"]; ?> ></label>
			<label for="usuario">Usuario<input type="text" maxlength="10" name="usuario" value=<?php echo "'" . $usuario["name"] . "'"; ?> ></label>
			<label for="password1">Password<input type="password" maxlength="10" value=<?php echo "'" . $usuario["password"] . "'"; ?> ></label>
			<label for="password2">Repetir Password<input type="password" maxlength="10" name="password" value=<?php echo "'" . $usuario["password"] . "'"; ?> ></label>
			<label for="rol">Seleccionar Rol
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
			<input type="submit" value="Modificar">
		</form>
	</main>
</body>
</html>