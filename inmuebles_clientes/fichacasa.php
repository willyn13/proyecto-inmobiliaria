<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>

<?php
session_start();
$dni = $_SESSION["dni"];

echo '<div class="cls_dialog">';
$conexion = mysqli_connect('localhost','root','','inmobiliaria')
or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

if (mysqli_connect_error()) {
printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
exit();
}

echo '</div>';

$sqlMostrar = "SELECT `idcasa`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
FROM `inmuebles` , `localidades`, `provincias`
WHERE `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia` and `inmuebles`.`idcasa`= '".$_GET['idcasa']."'";	

$resultado = mysqli_query($conexion,$sqlMostrar);

while ($inmueble = mysqli_fetch_array($resultado)){
if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
$idcasa = $inmueble['idcasa'];

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

$display.="</table></div>";
mysqli_close($conexion);
echo $display;
?>