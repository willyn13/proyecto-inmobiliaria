<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	$display="<h3>Listado de clientes</h3></br>";	
	
	$consulta = 'SELECT * FROM clientes';
	$resultado= mysqli_query($conexion,$consulta)
	or die('Consulta fallida: ' . mysqli_error());
	
	$display.="<table border='1'>";
		if (mysqli_num_rows($resultado)==0 ){
			$display.="<p class=\"error\">
				&nbsp;&nbsp;&nbsp;&nbsp;<i>No hay clientes.</i> 
			 </p>";
		} else{
			$display.="<tr>
				<td></td>
				<td></td>
				<td>dni</td>
				<td>nombre</td>
				<td>apellidos</td>
				<td>telefono</td>
				<td>email</td>
				</tr>";
				

		while($reg=mysqli_fetch_array($resultado) ){
			$dni_cliente=$reg[0];
			$nombre=$reg[1];
			$apellidos=$reg[2];
			$telefono=$reg[3];
			$email=$reg[4];
				
			$display.="<tr>
				<td><a href=\"eliminar_cliente.php?dni_cliente=".$dni_cliente."\">Eliminar</a></td>
				<td><a href=\"modificar_cliente.php?dni_cliente=".$dni_cliente."\">Modificar</a></td>
				<td>".$dni_cliente."</td>	
				<td>".$nombre."</td>
				<td>".$apellidos."</td>
				<td>".$telefono."</td>
				<td>".$email."</td>

			</tr>";
	}
	$display.="<a href=\"altacliente.php\"><input type='SUBMIT' name='SUBMIT' value='Dar de alta un cliente'></a>";
}
$display.="</table>";
	mysqli_close($conexion);
	echo $display
?>