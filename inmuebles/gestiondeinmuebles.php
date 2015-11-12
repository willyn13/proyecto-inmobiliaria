<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<tittle>Listado de Inmmuebles</tittle>
</head>
<body>
<table>
<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	$dni= $_SESSION["MM_Username"];
$sqlMostrar = "SELECT `idcasa`, 'idlocalidad', `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
FROM `inmuebles` , `localidades`, `provincias`
where where'inmuebles'.'idlocalidad'=(select idzona from usuarios where dni='".$dni."') `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia`";

$resultado =mysqli_query($conexion,$sqlMostrar);
if (mysqli_num_rows($resultado)==0 ){
			echo "<p class=\"error\">
				&nbsp;&nbsp;&nbsp;&nbsp;<i>No hay inmuebles.</i> 
			 </p>";
			} else{
			 
while ($inmueble = mysqli_fetch_array($resultado)){
	if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
	if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
	if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
	if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
	/*echo ($inmueble['precio_venta']);*/
	/*$sqlLocalidad = "select * from localidades where idlocalidad = ".$inmueble['idlocalidad'];
	$resultado =mysqli_query($conexionInmobiliaria,$sqlLocalidad);
	while ( $localidad = mysqli_fetch_array($resultado)){	
		$local = $localidad['localidad'];
		$sqlProvincia = "select provincia from Provincias where idprovincia = ".$localidad['idprovincia'];
		$resul =mysqli_query($conexionInmobiliaria,$sqlProvincia);
		//$provin;
		while ( $provincia = mysqli_fetch_row($resul)){
			$provin = $provincia[0];
			/*echo  $provin;
		}
		echo ($inmueble['precio_venta']);
	}*/
			echo "<tr>";
			echo "<td> <img src=\"casas/".$inmueble['imagen01']."\"/  width=\"300\" height=\"250\"></td>";
			echo '<td><p> Precio de venta: ' .$inmueble['precio_venta'].'</p>';
			echo '<p> Precio de alquiler: ' .$inmueble['precio_alquiler'].'</p>';
			echo '<p> El inmueble consta de: ' .$inmueble['habitaciones'].' habitaciones, '.$inmueble['banios'].' baños y se encuentra en la calle '.$inmueble['direccion'].' en la comunidad de '.$inmueble['localidad'].' de la provincia de '.$inmueble['provincia'].'</p>';
			echo '<p>Piscina: '.$piscina;
			echo '<p>Terraza: '.$terraza;
			echo '<p>Trastero: '.$trastero;
			echo '<p>Garaje: '.$garaje;
			echo '</td>';
			$idcasa=$inmueble['idcasa'];

			session_start();
			$dni= $_SESSION["MM_Username"];
			$sql="select cargo from usuarios where dni='".$dni."'";
			$result= mysqli_query($conexion, $sql);
			while($fila = mysqli_fetch_row($result)){
				$cargo=$fila[0];
				}
				if($dni<>null){
					echo "
				<td><a href=\"eliminar_inmueble.php?idcasa=".$idcasa."\">Eliminar</a></td>
				<td><a href=\"modificar_inmueble.php?idcasa=".$idcasa."\">Modificar</a></td>
					</tr>";					
				}
				
			echo '</tr>';	
}			
}
?>
</table>
</body>
</html>

