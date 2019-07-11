<?php include("../pages/verificarLogueo.php") ?>
<?php
	require("../pages/conexion.php");

	$query = 'SELECT * FROM piezas WHERE cod_pza = "' . $_REQUEST["cod_pza"] . '"';

	if($resultado = mysqli_query($conexion, $query)) {
		$pieza = mysqli_fetch_assoc($resultado);
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - Modificar Pieza</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("../pages/header.php"); ?>
	<main>
		<h2>Modificar pieza:</h2>
		<?php if($_SESSION["username"] == "gerente") { ?>
		<form method="post" id="formRegistro" class="registroUsuario col-lg-5 col-md-7 col-sm-9" action=<?php echo "'modificarPieza.php?cod_pza=" . $pieza["cod_pza"] . "'"; ?>>
			<label for="cod_pza" class="col-lg-2 col-md-3 col-sm-7">Código pieza<input type="text" maxlength="10" autofocus="true" class="col-lg-2 col-md-3 col-sm-5" disabled value=<?php echo "'" . $pieza["cod_pza"] . "'"; ?> ></label>
			<label for="desc_pza" class="col-lg-2 col-md-3 col-sm-7">Descripcion<input type="text" maxlength="50" name="desc_pza" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo '"' . $pieza["desc_pza"] . '"'; ?> ></label>
			<label for="med_pza" class="col-lg-2 col-md-3 col-sm-7">Medidas<input type="text" maxlength="30" name="med_pza" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo "'" . $pieza["med_pza"] . "'"; ?> ></label>
			<label for="peso_pza" class="col-lg-2 col-md-3 col-sm-7">Peso<input type="number" max="900000" name="peso_pza" class="col-lg-2 col-md-3 col-sm-5" value=<?php echo "'" . $pieza["peso_pza"] . "'"; ?> ></label>
			<label for="tipo_pza" class="col-lg-5 col-md-7 col-sm-9">Tipo de Pieza
				<select name="tipo_pza" form="formRegistro">
					<option value="goma" <?php if($pieza["tipo_pza"] == "goma") echo 'selected="selected"'; ?> >Goma</option>
					<option value="metal" <?php if($pieza["tipo_pza"] == "metal") echo 'selected="selected"'; ?> >Metal</option>
					<option value="tela" <?php if($pieza["tipo_pza"] == "tela") echo 'selected="selected"'; ?> >Tela</option>
					<option value="goma y metal" <?php if($pieza["tipo_pza"] == "goma y metal") echo 'selected="selected"'; ?> >Goma y Metal</option>
					<option value="goma y tela" <?php if($pieza["tipo_pza"] == "goma y tela") echo 'selected="selected"'; ?> >Goma y Tela</option>
				</select>
			</label>
			<input type="submit" value="Modificar" class="btnAdmin">
		</form>
		<div class="contenedor">
			<div class="registrarUsuario">
				<a href="../pages/home.php">CANCELAR</a>
			</div>
		</div>
		<?php } ?>
	</main>
</body>
</html>