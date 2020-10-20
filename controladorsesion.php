  
<?php
session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: verifica.php');
}

include "conexion.php";  
$nombre=$_GET["nombre"];
$contra=$_GET["contraseña"];

$mensaje='';
$archivo='';
if (!empty($nombre)&&!empty($contra)) {
	$sql="SELECT nombre,contraseña FROM usuario WHERE nombre like '$nombre' and contraseña like '$contra'";

	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);


	if(!empty($fila)&&$fila[0]==$nombre&&$fila[1]==$contra){

		$_SESSION['usuario']=$nombre;
		header('Location: verifica.php');
	}else{
		$mensaje.="<li style='color: white';>Usuario no registrado</li>";

	}
}else{
	$mensaje.="<li style='color: white';>No lleno todos los Datos</li>";}
	
	include "iniciasesion.php";
	?>