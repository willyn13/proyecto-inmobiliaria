<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion</title>
</head>
</html>
<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
	session_start();
$dni= $_SESSION["MM_Username"];
$sql="select cargo,idzona from usuarios where dni_usuario='".$dni."'";
$result= mysqli_query($conexion,$sql);
while($fila = mysqli_fetch_row($result)){
       $cargo=$fila[0];
       }
       if($cargo=="admin"){
		   $consulta = "SELECT * FROM alquileres";        
       }else{
		   $sql1="select zona from usuarios where dni_usuario='".$dni."'";
		   $result1= mysqli_query($conexion,$sql1);
		   while($fila = mysqli_fetch_row($result1)){
               $zona=$fila[0];
			}	
       $consulta = "select * from alquileres where dni_usuario = '".$dni."'";
       }
	

$display=""; 
$resultado1=mysqli_query($conexion,$consulta);


while($fila = mysqli_fetch_row($resultado1)){
$IDCASA = $fila[0];
$FECHAINICIO = $fila[3];
$FECHAFIN = $fila[4];
$PRECIOALQUILER = $fila[5];
$DNIINQUILINO = $fila[1];
$display.= "<table id='tabladatos' border='1'> \n
			<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>ID CASA</td>
			<td>FECHA DE INICIO</td>
			<td>FECHA DE FIN</td>
			<td>PRECIO DE ALQUILER</td>
			<td>DNI DEL INQUILINO</td>
			
			
			
</tr>";
$display.="

 <tr>
<td width='40' align='left' ><A HREF=\"eliminaralquiler.php?IDCASA=".$IDCASA."&&FECHAINICIO=".$FECHAINICIO."&&FECHAFIN=".$FECHAFIN."\">Eliminar alquiler</A></td>
<td width='40' align='left' ><A HREF=\"formulariomodificaralquiler.php?IDCASA=".$IDCASA."&&FECHAINICIO=".$FECHAINICIO."&&FECHAFIN=".$FECHAFIN."&&PRECIOALQUILER=".$PRECIOALQUILER."&&DNIINQUILINO=".$DNIINQUILINO."\">Modificar alquiler</A></td>
<td width='40' align='center' >".$IDCASA."</td>
<td width='40' align='center' >".$FECHAINICIO."</td>
<td width='40' align='center' >".$FECHAFIN."</td>
<td width='40' align='center' >".$PRECIOALQUILER."</td>
<td width='40' align='center' >".$DNIINQUILINO."</td>
</tr>";
}
$display.="</table>
";
echo $display;
echo "<a href='formularioaltaalquiler.php'>ALTA DE ALQUILERES</a>";
echo "<P><a href=\"principal.php\"><img src='home.png' alt='arriba' WIDTH='100' HEIGHT='100' border='0'>";
echo "</br>";
?>