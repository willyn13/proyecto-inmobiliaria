<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}


$consulta="update usuarios set 
dni_usuario ='".$_POST['dni_usuario']."',
idzona= '".$_POST['zona']."',
nombre= '".$_POST['nombre']."', 
apellidos= '".$_POST['apellidos']."', 
cargo= '".$_POST['cargo']."'
where dni_usuario= '".$_POST['dni_usuario']."'";


echo $consulta;
echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

if ($resultado){echo "Comercial actualizado";}
else
{echo "Comercial NO actualizado";}

?>