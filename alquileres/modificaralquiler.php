<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar alquileres</title>
</head>
</html>
<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
//session_start();
//$dni= $_SESSION["MM_Username"];
$consulta="update alquileres set 
fecha_inicio='".$_POST['FECHAINICIO']."', 
fecha_fin='".$_POST['FECHAFIN']."', 
precio_final=".$_POST['PRECIOALQUILER'].",
dni_inquilino='".$_POST['DNIINQUILINO']."'
where idcasa=".$_POST['IDCASA']."";

echo $consulta;
echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); 

if ($resultado){echo "Alquiler actualizado";}
else
{echo "Alquiler NO actualizado";}

?>