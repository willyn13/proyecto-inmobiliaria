<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Insertar Inmueble</title>
</head>
<?php
session_start();
$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
  
//$dni="1";
//$dni= $_SESSION["MM_Username"];
$dni= $_SESSION["dni"];
//echo $dni;
$cargo= "";
$zona="";
$sql="select cargo, idzona from usuarios where dni_usuario='".$dni."'";
$result= mysqli_query($conexion,$sql);
while($fila = mysqli_fetch_row($result)){
       $cargo=$fila[0];
      // echo $cargo;
       $zona =$fila[1];
      // echo $zona;
       }
      //echo $zona;
?>
<body>
<form action="insertar_Inmueble.php" method="POST" enctype="multipart/form-data">
  <table align="center">    
  <tr valign="baseline">
      <td nowrap="nowrap" align="right">Venta:</td>
      <td><select name="venta">
		<option value= selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr> 
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alquiler:</td>
      <td><select name="alquiler">
		<option selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Habitaciones:</td>
      <td><input type="text" name="habitaciones" maxlength="2" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">M2:</td>
      <td><input type="text" name="m2" maxlength="3" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Baños:</td>
      <td><input type="text" name="banios" maxlength="1" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Terraza:</td>
      <td><select name="terraza">
		<option selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Trastero:</td>
      <td><select name="trastero">
		<option selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Piscina:</td>
      <td><select name="piscina">
		<option selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Garaje:</td>
      <td><select name="garaje">
		<option selected>Seleccione Si o No</option>
		<option value=0 >NO</option>
		<option value=1 >SI</option></td></tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direccion:</td>
      <td><input type="text" name="direccion" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Localidad:</td>
      <td>
	  <select name="localidad">
    <option selected>Selecciona localidad</option>
<?php	

//$dni="";
$dni= $_SESSION['dni'];
/*$result= mysqli_query($conexion,$sql);
       $cargo=$fila[0];
       $zona =$fila[1];
       
      echo $zona;
      */
	if($cargo=="admin"){
          $consulta="SELECT idlocalidad,localidad from localidades";       
       }else{
          $consulta="SELECT idlocalidad,localidad from localidades where idlocalidad=".$zona;
       }
       $resultado= mysqli_query($conexion,$consulta);
while ($localidad=mysqli_fetch_array($resultado)){
echo "<option value='".$localidad[0]."'>".$localidad[1]."</option>";
}
//<input type="text" name="localidad" value="" size="32" /></td>
echo $zona;
?> 

 </td>
 </tr>
 <?php
  echo "Zona= ".$zona." y cargo = ".$cargo;
 ?>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Precio_venta:</td>
      <td><input type="text" name="precio_venta" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Precio_alquiler:</td>
      <td><input type="text" name="precio_alquiler" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Insertar imagenes:</td>
      <td><input type="file" name="imagen[]" multiple='multiple' /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dnipropietario:</td>
      <td><select name="dnipropietario">
         <option value="Error" selected>Selecciona Propietario</option>
<?php                
$consulta="SELECT dni_cliente,nombre, apellidos from clientes";
$resultado=mysqli_query($conexion,$consulta);
while ($cliente=mysqli_fetch_array($resultado)){
echo "<option value='".$cliente[0]."'>".$cliente[1].", ".$cliente[2]."</option>";
}
?></td></tr>
  <td><input type="SUBMIT" align="center" name="SUBMIT" value="Insertar Inmueble"></td>
  </table>
</form>
<P><a href="principal.php"><img src='home.png' alt='arriba' WIDTH='100' HEIGHT='100' border='0'>
</body>
</html>
