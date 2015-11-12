<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	$sql_comercial = "select * from usuarios where dni_usuario='".$_GET['dni_usuario']."'";	
	$resp_sql = mysqli_query($conexion,$sql_comercial);
	
	
	$i=0;
	while($datos=mysqli_fetch_row($resp_sql)){
		foreach($datos as $valor){
			$datos[$i]=$valor;
			$i++;			
			if ($i==3){break;}
		}
		$comercial=$datos;
	}	
	
	$dni_usuario=$comercial[0];

	setcookie('dni_usuario',$dni_usuario);
	

?>
<html>


<table cellpadding="6" >
	<form action="actualizar_comercial.php" method="POST">
		
	<div class="flotados1">
		<table cellpadding="5">		
			<tr>
			<td><h3>Modifica los datos necesarios.</h3></td>
			</tr>
			<tr>
				<td><label for="dni"> dni </label></td>
				<td><font>(*) </font><input type="text" id="dni_usuario" name="dni" value="<?php echo $comercial[0] ?>" required/></td>
			</tr>
			<tr>
				<td><label for="nombre"> Nombre </label></td>
				<td><font>(*) </font><input type="text" id="nombre" placeholder="Escribe nombre" name="nombre" value="<?php echo $comercial[2] ?>" required/></td>
			</tr>
			<tr>
				<td><label for="apellidos"> Apellidos: </label></td>
				<td><font>(*) </font><input type="text" id="apellidos" placeholder="Escribe apellidos" name="apellidos" value="<?php echo $comercial[3] ?>"/></td>
			</tr>
			<tr>
				<td><label for="cargo"> Cargo: </label></td>
				<td><font>(*) </font><input type="text" id="cargo" placeholder="Escribe cargo" name="cargo" value="<?php echo $comercial[4] ?>" /></td>
			</tr>		
			<tr>
				<td><label for="zona"> Zona: </label></td>
				<td><font>(*) </font><input type="text" id="zona" placeholder="Escribe zona" name="zona" value="<?php echo $comercial[1] ?>" /></td>
			</tr>	
		</table>
	</div>
	<div class="flotados3">
		<table cellpadding="5">
			<tr>
				<td ><br><input type="submit" id="boton" value="Guardar cambios" name="boton"/></td>
			</tr>
		</table>
	</div>
	
	
</form>
</table>

</html>