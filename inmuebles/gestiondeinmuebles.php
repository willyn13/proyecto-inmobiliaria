<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<?php
    session_start();
    $dni = $_SESSION["dni"];
    
    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
            printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
            exit();
        }
    echo '</div>';
    
    $dni = $_SESSION["dni"];
    $sqlMostrar = "SELECT `idcasa`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`,
        `garaje`, `direccion`, `precio_venta`, `precio_alquiler`, `localidad`, `provincia` 
        FROM `inmuebles` , `localidades`, `provincias`
        WHERE `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia` 
        AND `inmuebles`.`idlocalidad` =(SELECT idzona FROM usuarios WHERE dni_usuario='".$dni."')";

    //$resultado=mysqli_query($conexion,$sqlMostrar);
    $resultado = mysqli_query($conexion,$sqlMostrar) or die (mysqli_error($conexion));
    if (mysqli_num_rows($resultado) == 0){
        echo "<p class=\"error\" <i>No hay inmuebles.</i></p>";
    } else {
        while ($inmueble = mysqli_fetch_array($resultado)){
            $display = '<div class="cls_gestiones"><h1>Gestión de Inmuebles</h1>';	
            
            if($inmueble['piscina'] == 0) {$piscina = "no";} else {$piscina = "si";}
            if($inmueble['terraza'] == 0) {$terraza = "no";} else {$terraza = "si";}
            if($inmueble['trastero'] == 0) {$trastero = "no";} else {$trastero = "si";}
            if($inmueble['garaje'] == 0) {$garaje = "no";} else {$garaje = "si";}
            $idcasa = $inmueble['idcasa'];
            
            $display.= '<table>
                <a><input type="button" id="id_alta_alquiler" name="alta_alquiler" value="Dar de Alta un Inmueble"></a>
                <tr>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                    <th>P.V.P.</th>
                    <th>P.A.P.</th>
                    <th>HABITACIONES</th>
                    <th>BAÑOS</th>
                    <th>PISCINA</th>
                    <th>TERRAZA</th>
                    <th>TRASTERO</th>
                    <th>GARAJE</th>
                    <th>DIRECION</th>
                    <th>LOCALIDAD</th>
                    <th>PROVINCIA</th>
                </tr>';
            
            $display.="<tr>
                    <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$idcasa."','inmuebles/eliminar_inmueble.php')\"></a></td>
                    <td><a><input type='button' value='Modificar' onclick=\"ajaxSinFormulario('".$idcasa."','inmuebles/modificar_inmueble.php')\"></a></td>
                    <td>".$inmueble['precio_venta']."</td>
                    <td>".$inmueble['precio_alquiler']."</td>
                    <td>".$inmueble['habitaciones']."</td>
                    <td>".$inmueble['banios']." €</td>
                    <td>".$piscina."</td>
                    <td>".$terraza."</td>
                    <td>".$trastero."</td>
                    <td>".$garaje."</td>
                    <td>".$inmueble['direccion']."</td>
                    <td>".$inmueble['localidad']."</td>
                    <td>".$inmueble['provincia']."</td>
                  </tr>";
        }	
        
    $display.="</table></div>";
    mysqli_close($conexion);
    echo $display;
    }
?>