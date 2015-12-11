<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
if (!empty($_POST['boton'])){

$idcasa=$_POST['idcasa'];
//campos del insert
session_start();
$dni= $_SESSION["dni"];

$consulta="INSERT INTO ventas(idcasa,dni_comprador,dni_usuario,fecha_compra,precio_final) VALUES (".$_POST["idcasa"].",'".$_POST["dnipropietario"]."'
	,'".$dni."',".$_POST["FECHACOMPRA"]."',".$_POST["PRECIOVENTA"].")";

$resultado_insert=mysqli_query($conexion,$consulta);
if($resultado_insert === TRUE){
header("Location: mostrarventas.php");
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
 <h3>Insertar venta</h3>
<body>

<?php
if (empty($_POST['idcasa'])){}
$id_padre=$_POST['idcasa'];
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">\n\n";
?>


<table cellpadding="5">		
			
<tr>
<td><label for="idcasa">Casa</label></td>
<td><font>(*) 
<select name="idcasa" onChange='this.form.submit()' style="width: 200px;">

<?php		
$consulta="SELECT idcasa from inmuebles where venta=1";
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
					$consulta="SELECT precio_venta from inmuebles where idcasa='".$id_padre."'";
					$resultado=mysqli_query($conexion,$consulta);
					if (mysqli_num_rows($resultado) !=0){
					while ($casa=mysqli_fetch_array($resultado))
						{
						echo "<input type =\"text\" name =\"PRECIOVENTA\" value=".$casa[0].">";
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
<p> FECHA VENTA: <br>
<input type="text" name="FECHACOMPRA" value="AAAA/MM/DD" size="100">
</tr>		
<tr>
<p> DNI DEL COMPRADOR: <br>
<select name="dnipropietario">
     <option value="" selected>Selecciona Comprador</option>
<?php                 
$consulta="SELECT dni_cliente,nombre, apellidos from clientes where dni_cliente NOT IN(select dni_inquilino from alquileres ) and dni_cliente NOT IN (select dni_comprador from ventas) and dni_cliente NOT IN(select dni_propietario from inmuebles)";
$resultado=mysqli_query($conexion,$consulta);
while ($cliente=mysqli_fetch_array($resultado)){
echo "<option value=\"".$cliente[0]."\">".$cliente[1].", ".$cliente[2]."</option>";
}
?></select>
	</div>
	<div class="flotados3">
		<table cellpadding="5">
			<tr>
				<td><br><input type="submit" id="boton" value="Guardar Venta" name="boton"/></td>
			</tr>
		</table>
	</div>
</form>

</body>		

</html>		