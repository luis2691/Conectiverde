<?php
session_start();
$log=$_POST['log']; /// recivo los datos de login
$cont=$_POST['cont']; // recivo los datos de la contraseña

$con = mysql_connect('localhost', 'root', '')  or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('prefectura') or die('No se pudo seleccionar la base de datos');
mysql_set_charset('utf8');

$sql="SELECT * FROM `usuarios` WHERE `Usu_login`='$log' and `Usu_clave`='$cont'"; // realizo la comparación con la base de datos
    $res=mysql_query($sql,$con);
    if($row=mysql_fetch_array($res)){
    $_SESSION['id']=$row['Usu_id']; // descargo id de la bd
    $_SESSION['nom']=$row['Nombre']; // descargo el nombre de la base de datos
    $ns=$row['Nivel_Usuario']; // descargo el niver de usuario


            if($ns==1){ // relizo la comparacion para saber a q menu de usuario me va direcionar si es NivelUsuario 1 va al pagina inicio administrador
            header("refresh:0.1 ;url=/inicioadmin.php");
}else{header("refresh:0.1 ;url=/iniciousu.php"); si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
}
            }else{
        echo"<script language='javascript'>alert('Error En el Usuario o Contraseña Intente de Nuevo'); </script>";
            header("refresh:0.1 ;url=/prefectura/index.html");
    }


?>
