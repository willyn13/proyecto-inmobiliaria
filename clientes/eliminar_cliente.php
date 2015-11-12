<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$sql_delete="delete from clientes where dni_cliente='".$_GET['dni_cliente']."'";
$result=mysqli_query($conexion,$sql_delete);
if($result===true){
echo "Cliente borrado";
}
else{
echo "Cliente no borrado";
}
?>