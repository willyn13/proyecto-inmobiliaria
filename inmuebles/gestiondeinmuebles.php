<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<!--<table>-->
<?php
session_start();
$dni= $_SESSION["dni"];
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

$sqlMostrar = "SELECT inmuebles.idcasa, inmuebles.idlocalidad, venta, alquiler, habitaciones, m2, banios, terraza, trastero, piscina, garaje, direccion, precio_venta, precio_alquiler, localidad, provincia 
FROM inmuebles , localidades, provincias
where inmuebles.idlocalidad=(select idzona from usuarios where dni_usuario='$dni') and inmuebles.idlocalidad=localidades.idlocalidad and localidades.idprovincia=provincias.idprovincia";

$resultado=mysqli_query($conexion,$sqlMostrar) or die (mysqli_error($conexion));
if (mysqli_num_rows($resultado)==0){
			echo "<p class=\"error\">
				&nbsp;&nbsp;&nbsp;&nbsp;<i>No hay inmuebles.</i> 
			 </p>";
			} else{
         echo '</div>';
        $display='<div class="cls_gestiones"><h1>Gestión de Alquileres</h1>';
        $display.="<table>";
	$display.="<a><input type='button' id='id_alta_inmueble' name='id_alta_inmueble' value='Dar de Alta un Inmueble'></a>";
                $display.="<tr>
                              <th></th>
                              <th></th>
                              <th>Habitaciones</th>
                              <th>Baños</th>
                              <th>Piscina</th>
                              <th>Terraza</th>
                              <th>Garaje</th>
                              <th>Venta</th>
                              <th>Precio venta</th>                            
                              <th>Alquilar</th>
                              <th>Precio alquiler</th>
                              <th>Provincia</th>
                              <th>Localidad</th>
                              <th>dirección</th>
                           </tr>";
                while ($inmueble = mysqli_fetch_array($resultado)){
                    if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
                    if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
                    if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
                    if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
                    $precioVenta = $inmueble['precio_venta'];
                    $precioAlquiler = $inmueble['precio_alquiler'];
                    $localidad = $inmueble['localidad'];
                    $provincia = $inmueble['provincia'];
                    $habitaciones = $inmueble['habitaciones'];
                    $banios = $inmueble['banios'];
                    $alquilar = $inmueble['alquiler'];
                    $venta = $inmueble['venta'];
                    $direccion = $inmueble['direccion'];
                    $id_casa = $inmueble['idcasa'];

                    $display.="<tr>
                                  <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$id_casa."','inmuebles/eliminar_inmueble.php')\"></a></td>
                                  <td><a><input type='button' value='Modificar' onclick=\"ajaxSinFormulario('".$id_casa."','inmuebles/insertarInmueble.php')\"></a></td>
                                  <td>".$habitaciones."</td>	
                                  <td>".$banios."</td>
                                  <td>".$piscina."</td>
                                  <td>".$terraza."</td>
                                  <td>".$garaje."</td>
                                  <td>".$venta."</td>
                                  <td>".$precioVenta."</td>
                                  <td>".$alquilar."</td>
                                  <td>".$precioAlquiler."</td>
                                  <td>".$provincia."</td>
                                  <td>".$localidad."</td>    
                                  <td>".$direccion."</td>     
                                </tr>";
                }
            }
        $display.="</table></div>";
        mysqli_close($conexion);
        echo $display;		 
//while ($inmueble = mysqli_fetch_array($resultado)){
//	if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
//	if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
//	if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
//	if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
//	echo ($inmueble['precio_venta']);
//	$sqlLocalidad = "select * from localidades where idlocalidad = ".$inmueble['idlocalidad'];
//	$resultado =mysqli_query($conexion,$sqlLocalidad);
//	while ( $localidad = mysqli_fetch_array($resultado)){	
//		$local = $localidad['localidad'];
//		$sqlProvincia = "select provincia from Provincias where idprovincia = ".$localidad['idprovincia'];
//		$resul =mysqli_query($conexion,$sqlProvincia);
//		
//		while ( $provincia = mysqli_fetch_row($resul)){
//			$provin = $provincia[0];
//			echo  $provin;
//		}
//		echo ($inmueble['precio_venta']);
//	}
//			echo "<tr>";
//			//echo "<td> <img src=\"casas/".$inmueble['imagen01']."\"/  width=\"300\" height=\"250\"></td>";
//			echo '<td><p> Precio de venta: ' .$inmueble['precio_venta'].'</p>';
//			echo '<p> Precio de alquiler: ' .$inmueble['precio_alquiler'].'</p>';
//			echo '<p> El inmueble consta de: ' .$inmueble['habitaciones'].' habitaciones, '.$inmueble['banios'].' baños y se encuentra en la calle '.$inmueble['direccion'].' en la comunidad de '.$inmueble['localidad'].' de la provincia de '.$inmueble['provincia'].'</p>';
//			echo '<p>Piscina: '.$piscina;
//			echo '<p>Terraza: '.$terraza;
//			echo '<p>Trastero: '.$trastero;
//			echo '<p>Garaje: '.$garaje;
//			echo '</td>';
//			$idcasa=$inmueble['idcasa'];
//                        
//			$sql="select cargo from usuarios where dni='".$dni."'";
//			$result= mysqli_query($conexion, $sql) or die(mysql_error($conexion));
//			while($fila = mysqli_fetch_row($result)){
//				$cargo=$fila[0];
//				}
//				if($dni!=null){
//					echo "
//				<td><a href=\"eliminar_inmueble.php?idcasa=".$idcasa."\">Eliminar</a></td>
//				<td><a href=\"modificar_inmueble.php?idcasa=".$idcasa."\">Modificar</a></td>
//					</tr>";					
//				}
//				
//			echo '</tr>';	
//}			
//                        }
?>
<!--</table>-->
</body>
</html>

