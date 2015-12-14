<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=stylesheet href="style.css" type="text/css">
<title>Listado de Inmmuebles</title>
</head>
<body>
<a href="busquedaCliente.php"><input type='SUBMIT' name='SUBMIT' value='Buscar casas'></a>
<table>
<?php
	// manager
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	//$dni = $_SESSION['dni'];
$sqlMostrar = "SELECT `idcasa`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
FROM `inmuebles` , `localidades`, `provincias` 
where `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` 
and `localidades`.`idprovincia`=`provincias`.`idprovincia` and `venta` = 1";

$resultado =mysqli_query($conexion,$sqlMostrar);
if (mysqli_num_rows($resultado)==0 ){
			echo "<p class=\"error\">
				&nbsp;&nbsp;&nbsp;&nbsp;<i>No hay inmuebles.</i> 
			 </p>";
			} else{
			 
while ($inmueble = mysqli_fetch_array($resultado)){
	if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
	if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
	if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
	if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
			echo "<tr>";
			
			//echo "<td> <img src=\"casas/".$inmueble['imagen1']."\"/  width=\"300\" height=\"250\"></td>";
			echo '<td><p> Precio de venta: ' .$inmueble['precio_venta'].'</p>';
			echo '<p> El inmueble consta de: ' .$inmueble['habitaciones'].' habitaciones, '.$inmueble['banios'].' baños y se encuentra en la calle '.
			$inmueble['direccion'].'</p>';
			echo '<p>Piscina: '.$piscina;
			echo '<p>Terraza: '.$terraza;
			echo '<p>Trastero: '.$trastero;
			echo '<p>Garaje: '.$garaje;
			echo '</td>';
			echo '</tr>';			
}			
}
?>
</table>
</body>
</html>
