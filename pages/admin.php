<h2>Todos los usuarios:</h2>
<table class="tablaUsuarios col-lg-5 col-md-7 col-sm-9">
	<thead>
		<tr>
			<th>Legajo</th>
			<th>Usuario</th>
			<th>Rol</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php
				$query = 'SELECT users.legajo, users.name, roles.rol FROM users INNER JOIN roles on users.legajo = roles.legajo ORDER BY users.legajo ASC';
		    if($resultado = mysqli_query($conexion, $query)) {
		    	while($usuario = mysqli_fetch_assoc($resultado)){
		    		if($usuario["rol"] != "admin") {
		    			echo "<tr><td>" . $usuario["legajo"] . "</td>
			    			 		<td>" . $usuario["name"] . "</td>
			    			 		<td>" . $usuario["rol"] . "</td>
			    			 		<td><a href='./modificarUser.php?legajo=". $usuario["legajo"] . "'>M</a></td>
			    			 		<td><a href='./eliminarUsuario.php?legajo=". $usuario["legajo"] . "'>X</a></td></tr>";
			    	}
		    	}
		?>
	</tbody>
</table>
<?php 
		}
?>
<div class="contenedor">
	<div class="registrarUsuario">
		<a href="./registrarUser.php">REGISTRAR NUEVO USUARIO</a>
	</div>
</div>