<?php
session_start();
$_SESSION["dni"] = $_POST["dni"];
$dni = $_SESSION["dni"];
$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
//Falla la consulta
$consulta = 'SELECT cargo from usuarios where dni_usuario = "$dni"';

$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

echo $resultado;

if($resultado == "Comercial"){
    include("menus/menu_comerciales.html");
}else if($resultado == "admin"){
    include("menus/menu_administradores.html");
}
?>

