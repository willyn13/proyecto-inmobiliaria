<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$sql_delete="delete from usuarios where dni_usuario='".$_GET['dni_usuario']."'";
$result=mysqli_query($conexion,$sql_delete);
if($result===true){
echo "Comercial borrado";
}
else{
echo "Comercial no borrado";
}
?>