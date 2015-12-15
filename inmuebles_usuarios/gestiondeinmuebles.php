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
    
    $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";

    $result = mysqli_query($conexion,$sql);
    
    while($fila = mysqli_fetch_row($result)){
        $cargo = $fila[0];
    }
    
    if($cargo == "Admin"){
        $sqlMostrar = "SELECT i.idcasa, i.venta, i.alquiler, i.habitaciones, i.m2, i.banios, i.terraza, i.trastero, i.piscina,
            i.garaje, i.direccion, i.precio_venta, i.precio_alquiler, l.localidad, p.provincia 
            FROM inmuebles i, localidades l, provincias p
            WHERE i.idlocalidad = l.idlocalidad AND l.idprovincia = p.idprovincia ";   
    } else {
        $sqlMostrar = "SELECT i.idcasa, i.venta, i.alquiler, i.habitaciones, i.m2, i.banios, i.terraza, i.trastero, i.piscina,
            i.garaje, i.direccion, i.precio_venta, i.precio_alquiler, l.localidad, p.provincia 
            FROM inmuebles i, localidades l, provincias p
            WHERE i.idlocalidad = l.idlocalidad AND l.idprovincia = p.idprovincia 
            AND i.idlocalidad = (SELECT idzona FROM usuarios WHERE dni_usuario='".$dni."')";
    }
    
    $display = '<div class="cls_gestiones"><h1>Gestión de Inmuebles</h1>';
    
    $resultado = mysqli_query($conexion,$sqlMostrar) or die (mysqli_error($conexion));
    
    $display.='<table>';
        if (mysqli_num_rows($resultado) == 0){
            echo "<h2 class=\"error\">No Hay Inmuebles.</h2>";
            $display.='<a><input type="button" id="id_alta_inmueble" name="alta_inmueble" value="Dar de Alta un Inmueble"></a>';
        } else {
            $display.='<a><input type="button" id="id_alta_inmueble" name="alta_inmueble" value="Dar de Alta un Inmueble"></a>
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
                                <th>DIRECCIÓN</th>
                                <th>LOCALIDAD</th>
                                <th>PROVINCIA</th>
                            </tr>';
        
            while ($inmueble = mysqli_fetch_array($resultado)){
                if($inmueble['piscina'] == 0) {$piscina = "no";} else {$piscina = "si";}
                if($inmueble['terraza'] == 0) {$terraza = "no";} else {$terraza = "si";}
                if($inmueble['trastero'] == 0) {$trastero = "no";} else {$trastero = "si";}
                if($inmueble['garaje'] == 0) {$garaje = "no";} else {$garaje = "si";}
                $idcasa = $inmueble['idcasa'];

                $display.="<tr>
                        <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$idcasa."','inmuebles_usuarios/eliminar_inmueble.php')\"></a></td>
                        <td><a><input type='button' value='Modificar' onclick=\"ajaxSinFormulario('".$idcasa."','inmuebles_usuarios/modificar_inmueble.php')\"></a></td>
                        <td>".$inmueble['precio_venta']."&nbsp;&nbsp;€</td>
                        <td>".$inmueble['precio_alquiler']."&nbsp;&nbsp;€</td>
                        <td>".$inmueble['habitaciones']."</td>
                        <td>".$inmueble['banios']."</td>
                        <td>".$piscina."</td>
                        <td>".$terraza."</td>
                        <td>".$trastero."</td>
                        <td>".$garaje."</td>
                        <td>".$inmueble['direccion']."</td>
                        <td>".$inmueble['localidad']."</td>
                        <td>".$inmueble['provincia']."</td>
                      </tr>";
            }	
        }
        
        $display.="</table></div>";
        mysqli_close($conexion);
        echo $display;
?>