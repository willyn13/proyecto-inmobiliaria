<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>

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
	
    $sqlMostrar = "SELECT `idcasa`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`,`idlocalidad`, `precio_venta`, `precio_alquiler`, `dni_propietario` FROM `inmuebles` , `localidades`, `provincias` WHERE `inmuebles`.`idlocalidad`=`localidades`.`idlocalidad` and `localidades`.`idprovincia`=`provincias`.`idprovincia`";

    $resultado = mysqli_query($conexion,$sqlMostrar);
    
    $display.='<table>';
        if (mysqli_num_rows($resultado) == 0){
            echo "<h2 class=\"error\">No Hay Inmuebles.</h2>";
        } else {

            while ($inmueble = mysqli_fetch_array($resultado)){
                if($inmueble['piscina']==0) {$piscina="no";} else {$piscina="si";}
                if($inmueble['terraza']==0) {$terraza="no";} else {$terraza="si";}
                if($inmueble['trastero']==0) {$trastero="no";} else {$trastero="si";}
                if($inmueble['garaje']==0) {$garaje="no";} else {$garaje="si";}
                            echo "<tr>";
                            echo "<td> <img src=\"casas/".$inmueble['imagen1']."\"/  width=\"300\" height=\"250\"></td>";
                            echo '<td><p> Precio de venta: ' .$inmueble['precio_venta'].'</p>';
                            echo '<p> Precio de alquiler: ' .$inmueble['precio_alquiler'].'</p>';
                            echo '<p> El inmueble consta de: ' .$inmueble['habitaciones'].' habitaciones, '.$inmueble['banios'].' baños y se encuentra en la calle '.
                            $inmueble['direccion'].' en la comunidad de '.$inmueble['localidad'].' de la provincia de '.$inmueble['provincia'].'</p>';
                            echo '<p>Piscina: '.$piscina;
                            echo '<p>Terraza: '.$terraza;
                            echo '<p>Trastero: '.$trastero;
                            echo '<p>Garaje: '.$garaje;
                            echo '</td>';
                            echo '</tr>';			
            }			
        }
        
        
        $display.="</table></div>";
        mysqli_close($conexion);
        echo $display;
?>