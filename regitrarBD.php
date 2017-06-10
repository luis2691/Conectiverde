<!DOCTYPE html>
<?php
include("misfunciones.php");
$conexion=Conectarse(); 
$codigo =  $_GET['Correo'];
$sql = "select * from Usuario where Correo = '" . $Correo . "'";
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
   		echo " El Cliente que desea ingresar ya existe ";
		mysql_close($conexion); 
     } else if( $numResults == 0) {
	$agregar = mysql_query("insert into Usuario values ('" .$_GET['Nombre']. "','" .$_GET['Rut']."','" .$_GET['Sexo']."','" .$_GET['Correo']."','" .$_GET['Password']. "')", $conexion); 
	$a= mysql_query("select * from usuario Where Correo = '" . $_GET['Correo'] . "'" , $conexion);
	echo "Usuario agregado con éxito";
?>
	
<br>		
<p class="pCliente">A continuación, se muestra el cliente que acaba de agregar.</p>
<table style="margin:0 auto;">
<tr style="text-decoration:underline;"><td>&nbsp;Código&nbsp;Cliente&nbsp;</td>
<td>&nbsp;Razon&nbsp;Cliente&nbsp;</td></tr>


</table> 
<a href="agregarCL.php" class="volver">Volver <a/>
	<a href="index.html" class="volver">Inicio <a/>
</body>
</html>