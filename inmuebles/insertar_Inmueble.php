<?php
$conexion = mysqli_connect('localhost','root','manager','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	
		
$sql = "INSERT INTO inmuebles (venta, alquiler, habitaciones, m2, bagnos, terraza, trastero, piscina, garaje, direccion, idlocalidad, precio_venta, precio_alquiler, imagen1, imagen2, imagen3, dnipropietario)
	VALUES ( ".$_POST["venta"].", ".$_POST["alquiler"].", ".$_POST["habitaciones"].", ".$_POST["m2"].",".$_POST["bagnos"].", ".$_POST["terraza"].", ".$_POST["trastero"].",".$_POST["piscina"].",".$_POST["garaje"].", '".$_POST["direccion"]."', ".$_POST["localidad"].", ".$_POST["precio_venta"].", ".$_POST["precio_alquiler"].", '".$_POST["imagen1"]."', '".$_POST["imagen2"]."', '".$_POST["imagen2"]."', '".$_POST["dnipropietario"]."')";

	
echo $sql;

	$res = mysqli_query($conexion,$sql);							
	if ($res === TRUE) {
	   	echo "Se ha insertado el usuario.";
		header ("Location: gestiondeinmuebles.php");
	} else {
		printf("No se pudo insertar el usuario: 
		%s\n", mysqli_error($conexion));
	}
	mysqli_close($conexion);
?>