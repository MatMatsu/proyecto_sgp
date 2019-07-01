<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Usuario</title>
</head>
<body>
	<header>
		
	</header>
	<main>
		<form action="registrarUsuario.php" method="post">
			<label for="legajo">Legajo: <input type="number" max="999" name="legajo"></label>
			<label for="usuario">Usuario: <input type="text" maxlength="10" name="usuario"></label>
			<label for="password">Password: <input type="password" maxlength="10" name="password"></label>
			<input type="submit">
		</form>
	</main>
</body>
</html>