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
        
$consulta = "SELECT cargo FROM usuarios where dni_usuario = '$dni' ";
$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

while($fila = mysqli_fetch_row($resultado)){
       $cargo=$fila[0];
       }
       echo $cargo;
    if($cargo == "Comercial"){
        include '../menus/menu_comerciales.html';
}else if($cargo == "admin"){
    include '../menus/menu_administradores.html';
}



?>