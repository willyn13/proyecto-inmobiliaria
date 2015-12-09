<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<tittle>Ficha de la casa</tittle>
</head>
<body>
<table>
<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
/*
$var = $_GET['idcasa'];
echo"$var";
*/
$sqlMostrar = "SELECT `idcasa`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
FROM `inmuebles` , `localidades`, `provincias`
where `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia` and `inmuebles`.`idcasa`= '".$_GET['idcasa']."'";	

$resultado =mysqli_query($conexion,$sqlMostrar);

while ($inmueble = mysqli_fetch_array($resultado)){
	if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
	if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
	if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
	if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
	$idcasa=$inmueble['idcasa'];

			echo "<TABLE BORDER=1 WIDTH=300>";
			echo "<tr>";
			echo "<td colspan=\"3\"><p> Precio de venta: " .$inmueble['precio_venta']."</p>";
			echo "<p> Precio de alquiler: " .$inmueble['precio_alquiler']."</p>";
			echo "<p> El inmueble consta de: " .$inmueble['habitaciones']." habitaciones, ".$inmueble['banios']." baños y se encuentra en la calle ".$inmueble['direccion']." en la comunidad de ".
			  $inmueble['localidad']." de la provincia de ".$inmueble['provincia']."</p>";
			echo "<p>Piscina: ".$piscina;
			echo "<p>Terraza: ".$terraza;
			echo "<p>Trastero: ".$trastero;
			echo "<p>Garaje: ".$garaje;
			echo "</td>";
			echo "</tr>";			
			echo "<tr>";
			echo "<td colspan=\"3\"><a href=\"gestiondeinmuebles.php?idcasa=".$idcasa."\">Volver</a></td>";
			echo "</tr>";
			echo "</TABLE>";
		}

?>


</table>
</body>
</html>

