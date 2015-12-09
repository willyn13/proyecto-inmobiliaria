<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Eliminar alquiler</title>
</head>
</html>
<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$sql_delete="delete from alquileres where idcasa=".$_GET['IDCASA']." and fecha_inicio='".$_GET['FECHAINICIO']."' and fecha_fin='".$_GET['FECHAFIN']."'";
$result=mysqli_query($conexion,$sql_delete);
if($result===true){
echo "Alquiler borrado";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostraralquiler.php'>TABLA DE ALQUILERES</a>";
}
else{
echo "Alquiler no borrado";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostraralquiler.php'>TABLA DE ALQUILERES</a>";
}
?>