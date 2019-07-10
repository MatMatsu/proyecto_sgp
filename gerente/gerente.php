<?php
	define("CANT_REG_PAG", 5);

	$query="SELECT * FROM piezas ORDER BY cod_pza ASC";
          //print_r($_GET);
	$pag_actual = (isset($_REQUEST['pag']))? $_REQUEST['pag'] : 1;
	unset($_REQUEST['pag']);

  $resultado = mysqli_query ($conexion, $query);
	echo mysqli_error($conexion);

	$cant_total = mysqli_num_rows($resultado);
	$cant_pag = ceil($cant_total / CANT_REG_PAG);

	/*echo "<br>cant_total<br>";
	echo "<br>" . $cant_total . "<br>";
	echo "<br>cant_pag<br>";
	echo "<br>" . $cant_pag . "<br>";*/

	$resultado = mysqli_query ($conexion, $query . " LIMIT " . (($pag_actual-1)*CANT_REG_PAG) . ", " . CANT_REG_PAG);
	echo mysqli_error($conexion);	
?>

<h2>Todas las piezas:</h2>
<table class="tablaUsuarios col-md-9 col-sm-9">
	<thead>
		<tr>
			<th>Código</th>
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Medida</th>
			<th>Peso</th>
			<th class="soloDesktop">Modificar</th>
			<th class="soloDesktop">Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php
    	while($pieza = mysqli_fetch_assoc($resultado)){
  			echo "<tr><td>" . $pieza["cod_pza"] . "</td>
  					<td>" . $pieza["tipo_pza"] . "</td>
    			  <td>" . $pieza["desc_pza"] . "</td>
    			 	<td>". $pieza["med_pza"] . "</td>
    			 	<td>". $pieza["peso_pza"] . "gr.</td>
    			 	<td class='soloDesktop'><a href='./modificarPza.php?cod_pza=" . $pieza["cod_pza"] . "'>M</a></td>
    			 	<td class='soloDesktop'><a href='./eliminarPieza.php?cod_pza='" . $pieza["cod_pza"] . "'>X</a></td></tr>";
    	}
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
<div class="contenedor">
	<div class="registrarUsuario">
		<a href="../gerente/registrarPza.php">REGISTRAR NUEVA PIEZA</a>
	</div>
</div>