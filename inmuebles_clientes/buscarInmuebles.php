<html>
<body>
<form action="buscarcasas.php" method="POST">
<table align="center">    
<tr valign="baseline">
<td nowrap="nowrap" align="right">Venta:</td>
<td><select name="venta">
<option value="" selected>Seleccione Si o No</option>
<option value=" and venta = 0" >NO</option>
<option value=" and venta = 1" >SI</option></td></tr> 
<tr valign="baseline">
<td nowrap="nowrap" align="right">Alquiler:</td>
<td><select name="alquiler">
<option value ="" selected>Seleccione Si o No</option>
<option value=" and alquiler = 0" >NO</option>
<option value=" and alquiler = 1" >SI</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Habitaciones:</td>
<td><select name="habitaciones">
<option value ="" selected>Seleccione numero de habitaciones</option>
<option value=" and habitaciones >=1" >Desde 1 habitacion</option>
<option value=" and habitaciones >=2" >Desde 2 habitaciones</option>
<option value=" and habitaciones >=3" >Desde 3 habitaciones</option>
<option value=" and habitaciones >=4" >Desde 4 habitaciones</option>
<option value=" and habitaciones >=5" >Desde 5 habitaciones</option>
<option value=" and habitaciones >= 6" >Desde 6 habitaciones</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">M2:</td>
<td><select name="m2">
<option value ="" selected>Seleccione la dimension de la casa</option>
<option value=" and m2 >=100" >Hasta 100 metros cuadrados</option>
<option value=" and m2 >=200" >Hasta 200 metros cuadrados</option>
<option value=" and m2 >=300" >Hasta 300 metros cuadrados</option></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Bagnos:</td>
<td><select name="banios">
<option value ="" selected>Seleccione numero de baños</option>
<option value=" and banios >=1" >Desde 1 baños</option>
<option value=" and banios >=2" >Desde 2 baños</option>
<option value=" and banios >=3" >Desde 3 baños</option>
<option value=" and banios >=4" >Desde 4 baños</option>
<option value=" and banios >=5" >Desde 5 baños</option>
<option value=" and banios >= 6" >Desde 6 baños</option></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Terraza:</td>
<td><select name="terraza">
<option value ="" selected>Seleccione Si o No</option>
<option value=" and terraza = 0" >NO</option>
<option value=" and terraza = 1" >SI</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Trastero:</td>
<td><select name="trastero">
<option value="" selected>Seleccione Si o No</option>
<option value=" and trastero = 0" >NO</option>
<option value=" and trastero = 1" >SI</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Piscina:</td>
<td><select name="piscina">
<option value="" selected>Seleccione Si o No</option>
<option value=" and piscina = 0" >NO</option>
<option value=" and piscina = 1" >SI</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Garaje:</td>
<td><select name="garaje">
<option value="" selected>Seleccione Si o No</option>
<option value=" and garaje = 0" >NO</option>
<option value=" and garaje = 1" >SI</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Localidad:</td>
<td><select name="localidad">
<option value="" selected>Selecciona localidad</option>
<?php		
session_start();
$consulta= "SELECT * from localidades";
$dni= $_SESSION["MM_Username"];
$sql="select cargo from usuarios where dni='".$dni."'";
$result= mysqli_query($conexion,$sql);
while($fila = mysqli_fetch_row($result)){
$cargo=$fila[0];
}
if($cargo=="admin"){
$consulta= "SELECT * from localidades";       
}else{
$sql1="select idzona from usuarios where dni='".$dni."'";
$result1= mysqli_query($conexion,$sql1);
while($fila = mysqli_fetch_row($result1)){
$zona=$fila[0];
}	
$consulta= "SELECT * from localidades where idlocalidad=".$zona.")";
}


$consulta= "SELECT * from localidades ";
$resultado=mysqli_query($conexion,$consulta);
while ($localidad=mysqli_fetch_array($resultado)){
echo "<option value=\" and idlocalidad = ".$localidad[0]."\">".$localidad[3]."</option>";
}
?>  </td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Precio_venta:</td>
<td><select name="precio_venta">
<option value ="" selected>Seleccione coste maximo</option>
<option value=" and Precio_venta <=50000" >hasta 50000 €</option>
<option value=" and Precio_venta <=100000" >hasta 100000 €</option>
<option value=" and Precio_venta <=150000" >hasta 150000 €</option>
<option value=" and Precio_venta <=200000" >hasta 300000 €</option>
<option value=" and Precio_venta <=250000" >hasta 250000 €</option>
<option value=" and Precio_venta <=300000" >hasta 300000 €</option>
<option value=" and Precio_venta <=350000" >hasta 350000 €</option></td></tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Precio_alquiler:</td>
<td><select name="precio_alquiler">
<option value ="" selected>Seleccione coste maximo</option>
<option value=" and precio_alquiler <=300" >hasta 300 €</option>
<option value=" and precio_alquiler <=400" >hasta 400 €</option>
<option value=" and precio_alquiler <=500" >hasta 500 €</option>
<option value=" and precio_alquiler <=600" >hasta 600 €</option>
<option value=" and precio_alquiler <=700" >hasta 700 €</option>
<option value=" and precio_alquiler <=800" >hasta 800 €</option>
<option value=" and precio_alquiler <=900" >hasta 900 €</option>
<option value=" and precio_alquiler <=1000" >hasta 1000 €</option>
</td></tr>

<?php
session_start();
$dni= $_SESSION["MM_Username"];
if ($dni != ''){
$consulta="SELECT dni,nombre, apellidos from clientes where dni_cliente IN(select dni_propietario from inmuebles)";
$resultado=mysqli_query($conexion,$consulta);
echo "<tr nowrap=\"nowrap\" align=\"right\">Dnipropietario:</tr>";
echo "<td><select name=\"dnipropietario\">";
echo '<option value="" selected>Selecciona Propietario</option>';
while ($cliente=mysqli_fetch_array($resultado)){
echo "<option value=\" and dnipropietario='".$cliente[0]."'\">".$cliente[1].", ".$cliente[2]."</option>";
}
}
echo "</td>";
?>

<td><input type="SUBMIT" align="center" name="SUBMIT" value="Buscar Inmueble"></td>
</tr>
</table>
</form>
<a href="principal.php"><img src='home.png' alt='home' WIDTH='100' HEIGHT='100' border='0'>
</body>
</html>