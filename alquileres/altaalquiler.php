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
$sql = "INSERT INTO alquileres(idcasa,dni_inquilino,dniusuario ,fechai_nicio,fecha_fin,precio_final)
 VALUES (".$_POST["IDCASA"].",'".$_POST["DNIINQUILINO"]."','".$dni."','".$_POST["FECHAINICIO"]."','".$_POST["FECHAFIN"]."',".$_POST["precio_final"].")";

echo $sql;
$res = mysqli_query($conexion,$sql);

if($res === TRUE){
echo "Se ha insertado un registro.";
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<a href='mostraralquiler.php'>TABLA DE ALQUILERES</a>";

}
else{
printf("No se pudo insertar el registro: 
%s/n", mysqli_error($conexion));
}
}
mysqli_close($conexion);
?>

<tr>
<p> FECHAINICIO: <br>
<input type="text" name="FECHAINICIO" value="AAAA/MM/DD" size="100">
</tr>
<tr>
<p> FECHAFIN: <br>
<input type="text" name="FECHAFIN" value="AAAA/MM/DD" size="100">
</tr>		
<tr>
<p> DNIINQUILINO: <br>
<input type='text' name='DNIINQUILINO'  size="100">
</tr>