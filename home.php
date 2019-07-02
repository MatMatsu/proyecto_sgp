<?php
	session_start();
	require("./pages/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SGP - HOME</title>
	<link rel="stylesheet" href="./styles/reset.css">
	<link rel="stylesheet" href="./styles/homeAdmin.css">
</head>
<body>
	<header>
		<a href="pages/logout.php" class="salir">logout</a>
		<h1>SGP</h1>
		<nav>
			
		</nav>
	</header>
	<?php 
		//CON REQUIRE MOSTRAR SEGUN EL ROL DEL USUARIO, LA PANTALLA CORRECTA

		//ADMIN TIENE COMO PRIMERA VISTA TODOS LOS USUARIOS, CADA UNO CON BOTON DE ELIMINAR O MODIFICAR
		//ADMIN TIENE UN BOTON PARA REGISTRAR USUARIOS NUEVOS Y DARLES ROLES
		//ADMIN TIENE BOTONES PARA INGRESAR NUEVAS PIEZAS, MODIFICARLAS O BORRARLAS

		//DEPOSITO TIENE COMO PRIMERA VISTA EL STOCK ACTUALIZADO
		//DEPOSITO TIENE QUE TENER UN BUSCADOR POR CÓDIGO
		//DEPOSITO TIENE BOTONES PARA HACER LOS PEDIDOS, LOS DESPACHOS Y LAS RECEPCIONES
	 ?>

	<main>
		<?php
					if($_SESSION["username"] == "admin") {
		?>
		<h2>Todos los usuarios:</h2>
		<table class="tablaUsuarios">
			<thead>
				<tr>
					<th>Legajo</th>
					<th>Usuario</th>
					<th>Rol</th>
					<th>Eliminar</th>
					<th>Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$query = 'SELECT users.legajo, users.name, roles.rol FROM users INNER JOIN roles on users.legajo = roles.legajo';
				    if($resultado = mysqli_query($conexion, $query)) {
				    	while($usuario = mysqli_fetch_assoc($resultado)){
				    		echo "<tr><td>" . $usuario["legajo"] . "</td>" .
					    			 "<td>" . $usuario["name"] . "</td>" .
					    			 "<td>" . $usuario["rol"] . "</td>" .
					    			 "<td><a href='./pages/eliminarUser.php?legajo=". $usuario["legajo"] . "'>X</a></td>
					    			 <td><a href='./pages/modificarUser.php?legajo=". $usuario["legajo"] . "'>M</a></td></tr>";
				    	}
				  	}
				  } else {
				?>
				
			</tbody>
		</table>
		<?php
				include("./pages/exito.php");
		  }
		?>
	</main>
</body>
</html>