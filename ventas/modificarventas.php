<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar ventas</title>
</head>
</html>
<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$consulta="update ventas set 
fecha_compra='".$_POST['FECHACOMPRA']."', 
precio_final=".$_POST['PRECIOVENTA'].",
dni_comprador='".$_POST['DNICOMPRADOR']."'
where idcasa=".$_POST['IDCASA']."";

echo $consulta;
echo "<br/>";
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); 

if ($resultado){echo "Venta actualizada";}
else
{echo "Venta NO actualizada";}

?>