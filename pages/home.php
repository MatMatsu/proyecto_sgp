<?php include("./verificarLogueo.php") ?>
<?php
	require("./conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - HOME</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<!-- <link rel="stylesheet" href="../styles/signin.css"> -->
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("./header.php"); ?>
	<?php 
		//CON REQUIRE MOSTRAR SEGUN EL ROL DEL USUARIO, LA PANTALLA CORRECTA

		//DEPOSITO TIENE COMO PRIMERA VISTA EL STOCK ACTUALIZADO
		//DEPOSITO TIENE QUE TENER UN BUSCADOR POR CÓDIGO
		//DEPOSITO TIENE BOTONES PARA HACER LOS PEDIDOS, LOS DESPACHOS Y LAS RECEPCIONES
	 ?>

	<main>
		<!-- ***************************** -->
		<!-- MENSAJE DE ALERTA -->
		<?php
			if (isset($_SESSION["message"])) {
		?> 
		<div class="mensaje" role="alert">
			<?php echo $_SESSION["message"] ?>
		</div>
		<?php
			}
			unset($_SESSION["message"]);
		?>
		<!-- ***************************** -->

		<?php
			if($_SESSION["username"] == "admin") {
				include("./admin.php");
			} elseif ($_SESSION["username"] == "gerente") {
				include("../gerente/gerente.php");
			} else {
			 	echo "<p class='youShallNotPass'>SU USUARIO NO TIENE PERMISO PARA INGRESAR AQUÍ</p>";
			}
		?>
	</main>
</body>
</html>