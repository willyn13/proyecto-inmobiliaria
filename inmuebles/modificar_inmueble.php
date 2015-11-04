<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar inmueble</title>
</head>
</html>
<?php

	$conexion = mysqli_connect('localhost','root','manager','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	$sql_inmueble = "select * from inmuebles where idcasa='".$_GET['idcasa']."'";	
	$resp_sql = mysqli_query($conexion,$sql_inmueble);
	
	
	$i=0;
	while($datos=mysqli_fetch_row($resp_sql)){
		foreach($datos as $valor){
			$datos[$i]=$valor;
			$i++;			
			if ($i==3){break;}
		}
		$inmueble=$datos;
	}	
	
	$idcasa=$inmueble[0];

	setcookie('idcasa',$idcasa);
	

?>
<html>


<table cellpadding="6" >
	<form action="actualizar_inmueble.php" method="POST">
		
	<div class="flotados1">
		<table cellpadding="5">		
			<tr>
			<td><h3>Modifica los datos necesarios.</h3></td>
			</tr>
			<tr>
				<td><label for="idcasa"> idcasa </label></td>
				<td><input type="text" id="idcasa" name="idcasa" value="<?php echo $inmueble[0] ?>" readonly/></td>
			</tr>
			<tr>
				<td><label for="venta"> Venta:  </label></td>
				<td><select name="venta">
<?php
if($inmueble[1]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr>
						<tr>
				<td><label for="alquiler"> Alquiler:  </label></td>
				<td><select name="alquiler">
<?php
if($inmueble[2]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr>
			<tr>
				<td><label for="habitaciones"> habitaciones: </label></td>
				<td><input type="text" id="habitaciones" placeholder="Escribe habitaciones" name="habitaciones" value="<?php echo $inmueble[3] ?>" /></td>
			</tr>		
			<tr>
				<td><label for="m2"> Metros cuadrados: </label></td>
				<td><input type="text" id="m2" placeholder="Escribe m2" name="m2" value="<?php echo $inmueble[4] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="bagnos"> Baños: </label></td>
				<td><input type="text" id="bagnos" placeholder="Escribe bagnos" name="bagnos" value="<?php echo $inmueble[5] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="terraza"> Terraza:  </label></td>
				<td><select name="terraza">
<?php
if($inmueble[6]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr>
						<tr>
				<td><label for="trastero"> Trastero:  </label></td>
				<td><select name="trastero">
<?php
if($inmueble[7]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr>
						<tr>
				<td><label for="piscina"> Piscina:  </label></td>
				<td><select name="piscina">
<?php
if($inmueble[8]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr>
						<tr>
				<td><label for="garaje"> Garaje:  </label></td>
				<td><select name="garaje">
<?php
if($inmueble[9]==0){
echo "<option value=0 selected>NO</option>";
echo "<option value=1 >SI</option>";
}
else{ 
 echo "<option value=1 selected>SI</option>";
 echo "<option value=0 >NO</option>";
 }
?>
			</tr> 
			<tr>
				<td><label for="direccion"> Dirección: </label></td>
				<td><input type="text" id="direccion" placeholder="Escribe direccion" name="direccion" value="<?php echo $inmueble[10] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="idlocalidad"> Localidad: </label></td>
				<td><select name="idlocalidad">
            <option selected >Selecciona localidad</option>
<?php          
$consulta1="SELECT localidad from localidades where idlocalidad=".$inmueble[11];
$resultado1=mysqli_query($conexion,$consulta1);
while ($idloc=mysqli_fetch_array($resultado1)){
echo"<option value='".$inmueble[11]."' selected>".$idloc[0]."</option>";
}
$consulta="SELECT idlocalidad,localidad from localidades";
$resultado=mysqli_query($conexion,$consulta);
while ($idlocalidad=mysqli_fetch_array($resultado)){
if($idlocalidad[0]<>$inmueble[11]) echo "<option value='".$idlocalidad[0]."'>".$idlocalidad[1]."</option>";
}

?>  </td>
			</tr>
			<tr>
				<td><label for="precio_venta"> Precio_venta: </label></td>
				<td><input type="text" id="precio_venta" placeholder="Escribe precio_venta" name="precio_venta" value="<?php echo $inmueble[12] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="precio_alquiler"> Precio_alquiler: </label></td>
				<td><input type="text" id="precio_alquiler" placeholder="Escribe precio_alquiler" name="precio_alquiler" value="<?php echo $inmueble[13] ?>" /></td>
			</tr>
			<tr>
				<td><label for="imagen1"> imagen1: </label></td>
				<td><input type="text" id="imagen1" placeholder="Escribe imagen1" name="imagen1" value="<?php echo $inmueble[14] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="imagen1"> imagen2: </label></td>
				<td><input type="text" id="imagen2" placeholder="Escribe imagen2" name="imagen2" value="<?php echo $inmueble[15] ?>" /></td>
			</tr>	
			<tr>
				<td><label for="imagen3"> imagen3: </label></td>
				<td><input type="text" id="imagen3" placeholder="Escribe imagen3" name="imagen3" value="<?php echo $inmueble[16] ?>" /></td>
			</tr>		
			<tr>
				<td><label for="dnipropietario"> Dni propietario: </label></td>
				<td><input type="text" id="dnipropietario" placeholder="Escribe dnipropietario" name="dnipropietario" value="<?php echo $inmueble[17] ?>" /></td>
			</tr>
		</table>
	</div>
	<div class="flotados3">
		<table cellpadding="5">
			<tr>
				<td ><br><input type="submit" id="boton" value="Guardar cambios" name="boton"/></td>
			</tr>
		</table>
	</div>	
	
</form>
</table>

</html>