<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Eliminar venta</title>
</head>
</html>
<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$sql_delete="delete from ventas where idcasa='".$_GET['IDCASA']."' and fecha_compra='".$_GET['FECHACOMPRA']."'";
$result=mysqli_query($conexion,$sql_delete);
if($result===true){
echo "Venta borrada";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostrarventas.php'>TABLA DE VENTAS</a>";
}
else{
echo "Venta no borrada";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostrarventas.php'>TABLA DE VENTAS</a>";
}
?>