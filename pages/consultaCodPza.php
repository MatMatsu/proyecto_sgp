<?php
require("./conexion.php");

$cod_pza = $_REQUEST['cod_pza'];

$query="SELECT desc_pza FROM piezas WHERE cod_pza = '".$cod_pza."'";

$resultado = mysqli_query($conexion, $query);

while($pieza = mysqli_fetch_array($resultado)) {
    echo $pieza['desc_pza'];
}
mysqli_close($conexion);
?>