<?php include("../pages/verificarLogueo.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - Registrar Pieza</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("../pages/header.php"); ?>
	<main>
		<h2>Registrar pieza nueva:</h2>
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
			if($_SESSION["username"] == "gerente") {
		?>
		<form action="./registrarPieza.php" method="post" id="formRegistro" autocomplete="nope" class="registroUsuario col-lg-5 col-md-7 col-sm-9">
			<label for="cod_pza" class="col-lg-2 col-md-3 col-sm-7">Código Pieza<input type="text" maxlength="10" name="cod_pza" autofocus="true" class="col-lg-2 col-md-3 col-sm-5" id="cod_pza" placeholder="0000/00" required="true"></label>
			<label for="desc_pza" class="col-lg-2 col-md-3 col-sm-7">Descripción<input type="text" maxlength="50" name="desc_pza" class="col-lg-2 col-md-3 col-sm-5" id="desc_pza" placeholder="nombre comercial" required="true"></label>
			<label for="med_pza" class="col-lg-2 col-md-3 col-sm-7">Medidas<input type="text" maxlength="30" name="med_pza" class="col-lg-2 col-md-3 col-sm-5" id="med_pza" placeholder="medidas de la pieza" required="true"></label>
			<label for="peso_pza" class="col-lg-2 col-md-3 col-sm-7">Peso de Pieza (gr)<input type="number" min="0" step="any" max="900000" name="peso_pza" class="col-lg-2 col-md-3 col-sm-5" id="peso_pza" placeholder="000000" required="true"></label>
			<label for="tipo_pza" class="col-lg-5 col-md-7 col-sm-9">Tipo de Pieza
				<select name="tipo_pza" form="formRegistro">
					<option value="goma">Goma</option>
					<option value="metal">Metal</option>
					<option value="tela">Tela</option>
					<option value="goma y metal">Goma y Metal</option>
					<option value="goma y tela">Goma y Tela</option>
				</select>
			</label>
			<input type="submit" value="REGISTRAR PIEZA" class="btnAdmin">
		</form>
		<div class="contenedor">
			<div class="registrarUsuario">
				<a href="../pages/home.php">VOLVER</a>
			</div>
		</div>
		<?php 
			} else {
			 	echo "<p class='youShallNotPass'>NECESITA SER ADMIN PARA INGRESAR AQUÍ</p>";
			}
		?>
	</main>
</body>
</html>