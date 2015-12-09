<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
if(mysqli_connect_errno()){
printf("No se pudo conectar: %$\n",mysqli_connect_error());
exit();
}
else{
	session_start();
$dni= $_SESSION["MM_Username"];
$sql ="INSERT INTO ventas(idcasa,dni_comprador,dni_usuario,fecha_compra,precio_final) VALUES (".$_POST["idcasa"].",'".$_POST["dnipropietario"]."'
	,'".$dni."',".$_POST["FECHACOMPRA"]."',".$_POST["PRECIOVENTA"].")";

echo $sql;
$res = mysqli_query($conexion,$sql);

if($res === TRUE){
echo "Se ha insertado un registro.";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostrarventas.php'>TABLA DE VENTAS</a>";
}
else{
printf("No se pudo insertar el registro: 
%s/n", mysqli_error($conexion));
}
}
mysqli_close($conexion);
?>