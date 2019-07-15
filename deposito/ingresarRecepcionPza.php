<?php include("../pages/verificarLogueo.php"); ?>
<?php 
	require("../pages/conexion.php");

	$query = "SELECT MAX(id_recepcion) AS ultimaRecepcion FROM recepcion_pzas";

	$resultado = mysqli_query($conexion, $query);
	$id_recepcion = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - Recepcion de Piezas</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("../pages/header.php"); ?>
	<main>
		<h2>Ingresar recepción de piezas:</h2>
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
			if($_SESSION["username"] == "deposito") {
		?>
		<form action="./ingresarRecepcionPieza.php" method="post" id="formRegistro" autocomplete="nope" class="recepcionPzas col-sm-7">
			<h3 class="pedido">Pedido Nº: <?php echo $id_recepcion["ultimaRecepcion"] + 1 ?></h3>
			<table class="recepcionPzasTabla col-sm-7">
				<thead>
					<tr>
						<th class="col-sm-1">Código Pieza</th>
						<th class="col-sm-5">Descripción</th>
						<th class="col-sm-1">Cantidad</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						for ($i = 0; $i < 10; $i++){
							echo '<tr>';
							echo '<td><input type="text" maxlength="10" name="cod_pza' . $i .'" autofocus="true" class="col-sm-1" placeholder="0000/00"></td>';
							echo '<td class="col-sm-5" id="cod_pza' . $i .'"></td>';
							echo '<td><input type="number" name="cant_recibida' . $i .'" max="100000" min="1" class="col-sm-1" placeholder="0"></td>';
							echo '</tr>';
						}
					 ?>
				</tbody>
			</table>
			<input type="submit" value="INGRESAR PEDIDO" class="btnIngresarPedido">
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
	<?php include("../pages/scriptJs.php"); ?>
	<script src="../js/consultaCodPza.js"></script>
</body>
</html>