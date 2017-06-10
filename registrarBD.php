<!DOCTYPE html>
<?php
include("misfunciones.php");
$conexion=Conectarse(); 
$codigo =  $_GET['Correo'];
$sql = "select * from usuario where Correo = '" . $Correo . "'";
$resultado=mysql_query( $sql ,$conexion); 
?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type= "text/css" href="css/estiloIndex.css" />

	</head>
<body>
<h1 class="titulo"> Usuario </h1>

<?php

   $numResults = mysql_num_rows($resultado);
     if ($numResults != 0) {
   		echo " El Usuario que desea ingresar ya existe ";
		mysql_close($conexion); 
     } else if( $numResults == 0) {
	$agregar = mysql_query("insert into usuario values ('" .$_GET['Nombre']. "','" .$_GET['Rut']."','" .$_GET['Sexo']."','" .$_GET['Correo']."','" .$_GET['Password']. "')", $conexion); 
	
	 echo "Usuario agregado con éxito";}
?>

		<a href="index.html" class="volver">Inicio <a/>
</body>
</html>