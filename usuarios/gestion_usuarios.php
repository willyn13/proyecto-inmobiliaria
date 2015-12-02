<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
	$display="<h3>Listado de comerciales</h3></br>";	
	
	$consulta = 'SELECT * FROM usuarios where cargo=\'Comercial\'';
	$resultado= mysqli_query($conexion,$consulta)
	or die('Consulta fallida: ' . mysqli_error());
	
	$display.="<table border='1'>";
		if (mysqli_num_rows($resultado)==0 ){
			$display.="<p class=\"error\">
				&nbsp;&nbsp;&nbsp;&nbsp;<i>No hay comerciales.</i> 
			 </p>";
		} else{
			$display.="<tr>
				<td></td>
				<td></td>
				<td>dni</td>
				<td>zona</td>
				<td>nombre</td>
				<td>apellidos</td>
				<td>cargo</td>				
				</tr>";
				

		while($reg=mysqli_fetch_array($resultado) ){
			$dni_usuario=$reg[0];
			$zona=$reg[1];
			$nombre=$reg[2];
			$apellidos=$reg[3];
			$cargo=$reg[4];
				
			$display.="<tr>
				<td><a href=\"eliminar_comercial.php?dni_usuario=".$dni_usuario."\">Eliminar</a></td>
				<td><a href=\"modificar_comercial.php?dni_usuario=".$dni_usuario."\">Modificar</a></td>
				<td>".$dni_usuario."</td>	
				<td>".$nombre."</td>
				<td>".$apellidos."</td>
				<td>".$cargo."</td>
				<td>".$zona."</td>

			</tr>";
	}
	$display.="<a href=\"alta_comercial.php\"><input type='SUBMIT' name='SUBMIT' value='Dar de alta un comercial'></a>";
}
$display.="</table>";
	mysqli_close($conexion);
	echo $display
?>
	
	
