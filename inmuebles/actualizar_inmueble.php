<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

/*`idcasa`=[value-1],`idlocalidad`=[value-2],`dni_propietario`=[value-3],`venta`=[value-4],`alquiler`=[value-5],
`habitaciones`=[value-6],`m2`=[value-7],`banios`=[value-8],`terraza`=[value-9],`trastero`=[value-10],`piscina`=[value-11],
`garaje`=[value-12],`direccion`=[value-13],`precio_venta`=[value-14],`precio_alquiler`=[value-15] WHERE 1
*/
$consulta="UPDATE inmuebles set 
idlocalidad=".$_POST['idlocalidad'].",
dni_propietario='".$_POST['dni_propietario']."',
venta='".$_POST['venta']."', 
alquiler='".$_POST['alquiler']."', 
habitaciones='".$_POST['habitaciones']."',
m2='".$_POST['m2']."',
banios='".$_POST['banios']."',
terraza='".$_POST['terraza']."',
trastero='".$_POST['trastero']."',
piscina='".$_POST['piscina']."',
garaje='".$_POST['garaje']."',
direccion='".$_POST['direccion']."',
precio_venta=".$_POST['precio_venta'].",
precio_alquiler=".$_POST['precio_alquiler']."
where idcasa=".$_POST['idcasa'];
//echo $consulta;
echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ;

if ($resultado){echo "Inmueble actualizado";
$idcasa=$_POST['idcasa'];
echo "<p><a href='fichacasa.php?idcasa=".$idcasa."'>Continuar</a></p>";}
/*<a href='fichacasa.php?idcasa=".$idcasa."'>*/
else
{echo "Inmueble NO actualizado";}

?>