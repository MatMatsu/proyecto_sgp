<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SGP - HOME</title>
</head>
<body>
	<h1>HOME</h1>
	<?php 
		//CON REQUIRE MOSTRAR SEGUN EL ROL DEL USUARIO, LA PANTALLA CORRECTA

		//ADMIN TIENE COMO PRIMERA VISTA EL TODOS LOS USUARIOS, CADA UNO CON BOTON DE ELIMINAR O MODIFICAR
		//ADMIN TIENE UN BOTON PARA REGISTRAR USUARIOS NUEVOS Y DARLES ROLES
		//ADMIN TIENE BOTONES PARA INGRESAR NUEVAS PIEZAS, MODIFICARLAS O BORRARLAS

		//DEPOSITO TIENE COMO PRIMERA VISTA EL STOCK ACTUALIZADO
		//DEPOSITO TIENE QUE TENER UN BUSCADOR POR CÓDIGO
		//DEPOSITO TIENE BOTONES PARA HACER LOS PEDIDOS, LOS DESPACHOS Y LAS RECEPCIONES
	 ?>
	<a href="pages/logout.php">logout</a>
</body>
</html>