<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=stylesheet href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Eliminar inmueble</title>
</head>
</html>
<?php
	$conexion = mysqli_connect('localhost','root','manager','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$sql_delete="delete from inmuebles where idcasa='".$_GET['idcasa']."'";
$result=mysqli_query($conexion,$sql_delete);
if($result===true){
echo "Inmueble borrado
<p><a href=\"principal.php\"><img src='home.png' alt='home' WIDTH='100' HEIGHT='100' border='0'>";
}
else{
echo "Inmueble no borrado";
}
?>