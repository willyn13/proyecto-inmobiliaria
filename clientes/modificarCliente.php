<?php

	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	$sql_cliente = "select * from clientes where dni_cliente='".$_GET['dni_cliente']."'";	
	$resp_sql = mysqli_query($conexion,$sql_cliente);
	
	
	$i=0;
	while($datos=mysqli_fetch_row($resp_sql)){
		foreach($datos as $valor){
			$datos[$i]=$valor;
			$i++;			
			if ($i==3){break;}
		}
		$cliente=$datos;
	}	
	
	$dni=$cliente[0];

	setcookie('dni',$dni);
	

?>
<html>


<table cellpadding="6" >
	<form action="actualizar_cliente.php" method="POST">
		
	<div class="flotados1">
		<table cellpadding="5">		
			<tr>
			<td><h3>Modifica los datos necesarios.</h3></td>
			</tr>
			<tr>
				<td><label for="dni"> dni </label></td>
				<td><font>(*) </font><input type="text" id="dni_cliente" name="dni_cliente" value="<?php echo $cliente[0] ?>" required/></td>
			</tr>
			<tr>
				<td><label for="nombre"> Nombre </label></td>
				<td><font>(*) </font><input type="text" id="nombre" placeholder="Escribe nombre" name="nombre" value="<?php echo $cliente[1] ?>" required/></td>
			</tr>
			<tr>
				<td><label for="apellidos"> Apellidos: </label></td>
				<td><font>(*) </font><input type="text" id="apellidos" placeholder="Escribe apellidos" name="apellidos" value="<?php echo $cliente[2] ?>"/></td>
			</tr>
			<tr>
				<td><label for="telefono"> Telefono: </label></td>
				<td><font>(*) </font><input type="text" id="telefono" placeholder="Escribe telefono" name="telefono" value="<?php echo $cliente[3] ?>" required/></td>
			</tr>		
			<tr>
				<td><label for="mail"> Email: </label></td>
				<td><font>(*) </font><input type="text" id="email" placeholder="Escribe mail" name="email" value="<?php echo $cliente[4] ?>" required/></td>
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