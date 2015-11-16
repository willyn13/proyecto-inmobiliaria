<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}


$consulta="update clientes set 
dni_cliente ='".$_POST['dni_cliente']."',
nombre='".$_POST['nombre']."', 
apellidos='".$_POST['apellidos']."', 
telefono=".$_POST['telefono'].",
email='".$_POST['email']."'
where dni_cliente=".$_POST['dni_cliente'];

echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

if ($resultado){echo "Cliente actualizado";}
else
{echo "Cliente NO actualizado";}

?>