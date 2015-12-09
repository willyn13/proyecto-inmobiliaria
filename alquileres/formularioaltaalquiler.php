<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
if (!empty($_POST['boton'])){

$idcasa=$_POST['IDCASA'];
//campos del insert

//INSERT INTO `alquileres` (`idcasa`, `dni_inquilino`, `dni_usuario`, `fecha_inicio`, `fecha_fin`, `precio_final`)
session_start();
$dni= $_SESSION["MM_Username"];
$consulta="INSERT INTO alquileres(idcasa,dni_inquilino,dni_usuario,fecha_inicio,fecha_fin,precio_final) VALUES (".$_POST["IDCASA"].",'".$_POST["DNIINQUILINO"]."','".$dni."','".$_POST["FECHAINICIO"]."','".$_POST["FECHAFIN"]."',".$_POST["precio_final"].",)";

$resultado_insert=mysqli_query($conexion,$consulta);
if($resultado_insert === TRUE){
header("Location: mostraralquiler.php");
}else{
printf("No se pudo insertar el registro. Por favor revise los datos ");
}

}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<html>
 <head>
 <link rel=stylesheet href="style.css" type="text/css">
 </head>
 <h3>Alta alquiler</h3>
<body>

<?php
if (empty($_POST['IDCASA'])){$_POST['IDCASA']='10';}
$id_padre=$_POST['IDCASA'];
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">\n\n";
?>


<table cellpadding="5">		
			
<tr>
<td><label for="idcasa">Casa</label></td>
<td><font>(*) 
<select name="IDCASA" onChange='this.form.submit()' style="width: 200px;">
<option value="" selected>Seleccione casa</option>
<?php		
$consulta="SELECT idcasa from inmuebles where alquiler=1";
$resultado=mysqli_query($conexion,$consulta);
while ($casa=mysqli_fetch_array($resultado))
{
if ($id_padre==$casa[0])
echo "<option value=".$casa[0]." selected>".$casa[0]."</option>";
else
{echo "<option value=".$casa[0].">".$casa[0]."</option>";}
}
echo $casa[0];
?>

</select>

				</font></td>
			<tr>	<td><label for="Precio">Precio</label></td>
				<td><font>(*) 
				
				<?php
					
					if (!empty($id_padre)){
					$consulta="SELECT precio_alquiler from inmuebles where idcasa='".$id_padre."'";
					$resultado=mysqli_query($conexion,$consulta);
					if (mysqli_num_rows($resultado) !=0){
					while ($casa=mysqli_fetch_array($resultado))
						{
						echo "<input type =\"text\" name =\"precio_final\" value=".$casa[0].">";
						}
						}else{
						echo "<input type =\"text\" value=''>";
						}
						}
					
				
				//mysqli_free_result($consulta);
				?>

</select></td></tr>
		</table>
		<tr>
<p> FECHA DE INICIO: <br>
<input type="text" name="FECHAINICIO" value="AAAA/MM/DD" size="100">
</tr>		
		<tr>
<p> FECHA DE FIN: <br>
<input type="text" name="FECHAFIN" value="AAAA/MM/DD" size="100">
</tr>	
<tr>
<p> DNI DEL COMPRADOR: <br>
<select name="DNIINQUILINO">
     <option value="" selected>Selecciona Comprador</option>
<?php                 
$consulta="SELECT dni_cliente, nombre, apellidos from clientes where dni_cliente NOT IN(select dni_inquilino from alquileres ) and dni_cliente NOT IN (select dni_comprador from ventas) and dni_cliente NOT IN(select dni_propietario from inmuebles)";
$resultado=mysqli_query($conexion,$consulta);
while ($cliente=mysqli_fetch_array($resultado)){
echo "<option value=\"".$cliente[0]."\">".$cliente[1].", ".$cliente[2]."</option>";
}
?></select>
	</div>
	<div class="flotados3">
		<table cellpadding="5">
			<tr>
				<td ><br><input type="submit" id="boton" value="Guardar Alquiler" name="boton"/></td>
			</tr>
		</table>
	</div>
</form>

</body>		

</html>		