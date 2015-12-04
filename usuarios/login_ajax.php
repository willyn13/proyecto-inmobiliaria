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
$consulta = "SELECT cargo FROM usuarios WHERE dni_usuario = '.$dni.'";

$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

echo strval($resultado);

if($resultado == "comercial"){
    include("menus/menu_comerciales.html");
}else if($resultado == "admin"){
    include("menus/menu_administradores.html");
}

?>