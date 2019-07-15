<?php
	include("../pages/verificarLogueo.php");
	require("../pages/conexion.php");
	define("CANT_REG_PAG", 5);

	$query="SELECT * FROM recepcion_pzas ORDER BY id_recepcion ASC";

	$pag_actual = (isset($_REQUEST['pag']))? $_REQUEST['pag'] : 1;
	unset($_REQUEST['pag']);

  $resultado = mysqli_query ($conexion, $query);
	echo mysqli_error($conexion);

	$cant_total = mysqli_num_rows($resultado);
	$cant_pag = ceil($cant_total / CANT_REG_PAG);


	$resultado = mysqli_query ($conexion, $query . " LIMIT " . (($pag_actual-1)*CANT_REG_PAG) . ", " . CANT_REG_PAG);
	echo mysqli_error($conexion);	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SGP - Registro de Recepcion</title>
	<link rel="stylesheet" href="../styles/reset.css">
	<!-- <link rel="stylesheet" href="../styles/signin.css"> -->
	<link rel="stylesheet" href="../styles/homeAdmin.css">
</head>
<body>
	<?php include("../pages/header.php"); ?>
<main>
<h2>Registro de Recepcion de Piezas:</h2>
<table class="tablaUsuarios col-sm-9 col-md-9 col-lg-9">
	<thead>
		<tr>
			<th>Id Recepcion</th>
			<th class="">Código</th>
			<th class="">Cantidad</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php
    	while($recepcion = mysqli_fetch_assoc($resultado)){
  			echo "<tr><td>" . $recepcion["id_recepcion"] . "</td>
    			  <td>" . $recepcion["cod_pza"] . "</td>
    			 	<td>". $recepcion["cant_recibida"] . "</td>
    			 	<td>". $recepcion["fecha_recepcion"] . "</td></tr>";
    	}
		?>
	</tbody>
</table>
<div class="paginas">
	<?php
		for($i = 1; $i <= $cant_pag ; $i++){
			if ($pag_actual != $i) {
				echo "<a href='./verRecepcionPza.php?pag=" . $i . "'style='margin-left: 5px;'>" . $i . "</a>";
			} else {
				echo $i;
			}
			if($i != $cant_pag) {
				echo " -";
			}
		}
	?>
</div>
<div class="btnVer col-lg-9">
	<div class="registrarUsuario">
		<a href="../pages/home.php">VOLVER</a>
	</div>
	<div class="registrarUsuario">
		<a href="../deposito/verDespachoPza.php">VER DESPACHO DE PIEZAS</a>
	</div>
	<div class="registrarUsuario">
		<a href="../deposito/verPedidoPza.php">VER PEDIDO DE PIEZAS</a>
	</div>
</div>
<div class="btnSoloDesktop col-lg-9">
	<div class="registrarUsuario">
		<a href="../deposito/ingresarRecepcionPza.php">INGRESAR RECEPCIÓN DE PIEZAS</a>
	</div>
	<div class="registrarUsuario">
		<a href="../deposito/ingresarDespachoPza.php">INGRESAR DESPACHO DE PIEZAS</a>
	</div>
	<div class="registrarUsuario">
		<a href="../deposito/ingresarPedidoPza.php">INGRESAR PEDIDO DE PIEZAS</a>
	</div>
</div>
</main>
	<?php include("../pages/scriptJs.php"); ?>
</body>
</html>