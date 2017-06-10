<!DOCTYPE html>
<?php
include("misfunciones.php");
$conexion=Conectarse(); 
$codigo =  $_GET['corr'];
$sql = "select * from usuario where Correo = '" . $codigo . "'";
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
     } else if( $numResults == 0)		 {
		 
	  $agregar = mysql_query("insert into usuario (`Nombre`, `Rut`, `Sexo`, `Correo`, `Password`) values ('" .$_GET['nom']. "','" .$_GET['ru']."','" .$_GET['sex']."','" .$_GET['corr']."','" .$_GET['pass']. "')", $conexion); 
	  
	 echo "Usuario agregado con éxito";}
?>

		<a href="index.html" class="volver">Inicio <a/>
</body>
</html>