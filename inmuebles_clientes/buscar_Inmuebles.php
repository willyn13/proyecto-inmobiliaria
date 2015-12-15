<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listado de Inmmuebles</title>
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



$sqlMostrar = "SELECT `idcasa`,'idlocalidad' , `venta`, `alquiler`, `habitaciones`, `m2`, `bagnos`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
FROM `inmuebles` , `localidades`, `provincias`
where `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia`".$_POST["venta"]."".$_POST["alquiler"]."".$_POST["habitaciones"]."".$_POST["m2"]."".$_POST["bagnos"]."".$_POST["terraza"]."".$_POST["trastero"]."".$_POST["piscina"]."".$_POST["garaje"]."".$_POST["localidad"]."".$_POST["precio_venta"]."".$_POST["precio_alquiler"]."".$_POST["dnipropietario"]."";

/*echo $sqlMostrar;*/
$resultado =mysqli_query($conexion,$sqlMostrar);
if (mysqli_num_rows($resultado)==0 ){
echo "no hay datos";
} else{

while ($inmueble = mysqli_fetch_array($resultado)){
if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
$idcasa=$inmueble['idcasa'];
echo "<tr>";
echo "<td> <a href='fichacasa.php?idcasa=".$idcasa."'><img src=\"casas/".$inmueble['imagen1']."\"/  width=\"300\" height=\"250\"></a></td>";
echo '<td><p> Precio de venta: ' .$inmueble['precio_venta'].'</p>';
echo '<p> Precio de alquiler: ' .$inmueble['precio_alquiler'].'</p>';
echo '<p> El inmueble consta de: ' .$inmueble['habitaciones'].' habitaciones, '.$inmueble['bagnos'].' baños y se encuentra en la calle '.$inmueble['direccion'].' en la comunidad de '.$inmueble['localidad'].' de la provincia de '.$inmueble['provincia'].'</p>';
echo '<p>Piscina: '.$piscina;
echo '<p>Terraza: '.$terraza;
echo '<p>Trastero: '.$trastero;
echo '<p>Garaje: '.$garaje;
echo '</td>';
echo "<td><a href=\"eliminar_inmueble.php?idcasa=".$idcasa."\">Eliminar</a></td>";
echo "<td><a href=\"modificar_inmueble.php?idcasa=".$idcasa."\">Modificar</a></td>";
echo '</tr>';	
}				
}			
?>
</table>
<P><a href="principal.php"><img src='home.png' alt='arriba' WIDTH='100' HEIGHT='100' border='0'> <a href="busqueda.php"><img src='buscar.png' alt='arriba' WIDTH='100' HEIGHT='100' border='0'>
</body>
</html>
