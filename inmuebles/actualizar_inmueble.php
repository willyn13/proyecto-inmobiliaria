<?php

	$conexion = mysqli_connect('localhost','root','manager','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}


$consulta="update inmuebles set 
venta=".$_POST['venta'].", 
alquiler=".$_POST['alquiler'].", 
habitaciones=".$_POST['habitaciones'].",
m2=".$_POST['m2'].",
banios=".$_POST['banios'].",
terraza=".$_POST['terraza'].",
trastero=".$_POST['trastero'].",
piscina=".$_POST['piscina'].",
garaje=".$_POST['garaje'].",
direccion='".$_POST['direccion']."',
idlocalidad=".$_POST['idlocalidad'].",
precio_venta=".$_POST['precio_venta'].",
precio_alquiler=".$_POST['precio_alquiler'].",
dnipropietario='".$_POST['dnipropietario']."'
where idcasa=".$_POST['idcasa'];

echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ;

if ($resultado){echo "Inmueble actualizado";
$idcasa=$_POST['idcasa'];
echo "<p><a href='fichacasa.php?idcasa=".$idcasa."'>Continuar</a></p>";}
/*<a href='fichacasa.php?idcasa=".$idcasa."'>*/
else
{echo "Inmueble NO actualizado";}

?>