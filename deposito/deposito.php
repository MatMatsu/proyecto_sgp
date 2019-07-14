<?php
	define("CANT_REG_PAG", 5);

	$query="SELECT stock_pzas.cod_pza, piezas.desc_pza, stock_pzas.cant_stock FROM stock_pzas INNER JOIN piezas ON stock_pzas.cod_pza = piezas.cod_pza WHERE stock_pzas.cant_stock > 0 ORDER BY stock_pzas.cod_pza ASC";
          //print_r($_GET);
	$pag_actual = (isset($_REQUEST['pag']))? $_REQUEST['pag'] : 1;
	unset($_REQUEST['pag']);

  $resultado = mysqli_query ($conexion, $query);
	echo mysqli_error($conexion);

	$cant_total = mysqli_num_rows($resultado);
	$cant_pag = ceil($cant_total / CANT_REG_PAG);


	$resultado = mysqli_query ($conexion, $query . " LIMIT " . (($pag_actual-1)*CANT_REG_PAG) . ", " . CANT_REG_PAG);
	echo mysqli_error($conexion);	
?>

<h2>Todas las piezas en stock:</h2>
<table class="tablaUsuarios col-sm-9 col-md-9 col-lg-9">
	<thead>
		<tr>
			<th class="">Código</th>
			<th class="">Descripción</th>
			<th class="">Cantidad</th>
		</tr>
	</thead>
	<tbody>
		<?php
    	while($stock = mysqli_fetch_assoc($resultado)){
  			echo "<tr><td>" . $stock["cod_pza"] . "</td>
    			  <td>" . $stock["desc_pza"] . "</td>
    			 	<td>". $stock["cant_stock"] . "</td></tr>";
    	}
    	print_r($stock);
		?>
	</tbody>
</table>
<div class="paginas">
	<?php
		for($i = 1; $i <= $cant_pag ; $i++){
			if ($pag_actual != $i) {
				echo "<a href='./home.php?pag=" . $i . "'style='margin-left: 5px;'>" . $i . "</a>";
			} else {
				echo $i;
			}
			if($i != $cant_pag) {
				echo " -";
			}
		}
	?>
</div>
<div class="btnSoloDesktop">
	<div class="registrarUsuario">
		<a href="../gerente/registrarPza.php">REGISTRAR NUEVA PIEZA</a>
	</div>
</div>