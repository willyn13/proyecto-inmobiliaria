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
        $consulta = 'SELECT * FROM peticiones';  
    } else {	
        $consulta = "SELECT * FROM peticiones WHERE localidad = (SELECT idzona FROM usuarios WHERE dni_usuario='".$dni."')";
    }
    
    $display = '<div class="cls_gestiones"><h1>Gestión de Peticiones</h1>';	

    $resultado = mysqli_query($conexion,$consulta) or die('Consulta fallida: ' . mysqli_error());

    $display.="<table>";
        if (mysqli_num_rows($resultado) == 0 ){
            $display.='<h2 class="error">No Hay Peticiones</h2>';
            $display.="<a><input type='button' id='id_alta_peticion' name='alta_peticion' value='Dar de Alta una Petición'></a>";
        } else {
            $display.="<a><input type='button' id='id_alta_peticion' name='alta_peticion' value='Dar de Alta una Petición'></a>
                        <tr>
                          <th></th>
                          <th>NOMRE</th>
                          <th>DNI</th>
                          <th>TELEFONO</th>
                          <th>PROVINCIA</th>
                          <th>LOCALIDAD</th>
                          <th>VENTA</th>
                          <th>PRECIO VENTA</th>
                          <th>ALQUILER</th>
                          <th>PRECIO ALQUILER</th>
                          <th>METROS CUADRADOS</th>
                          <th>BAÑOS</th>
                          <th>HABITACIONES</th>
                          <th>TERRAZA</th>
                          <th>GARAJE</th>
                          <th>PISCINA</th>
                          <th>DIRECCIÓN</th>
                       </tr>";

            while($reg = mysqli_fetch_array($resultado) ){
                $nombre = $reg["nombre"];
                $dni = $reg["dni"];
                $telefono = $reg["telefono"];
                $provincia = $reg["provincia"];
                $localidad = $reg["localidad"];
                if($reg["venta"] == "S"){$venta = "SI";}else{$venta = "NO";}
                if($reg["precio_venta"] != ""){$precio_venta = $reg["precio_venta"];}else{$precio_venta = "";}
                if($reg["alquiler"] == "S"){$alquiler = "SI";}else{$alquiler = "NO";}
                if($reg["precio_alquiler"] != ""){$precio_alquiler = $reg["precio_alquiler"];}else{$precio_alquiler = "";}
                $metros_cuadrados = $reg["m2"];
                $banios = $reg["banios"];
                $habitaciones = $reg["habitaciones"];
                if($reg["terraza"] == "S"){$terraza = "SI";}else{$terraza = "NO";}
                if($reg["garaje"] == "S"){$garaje = "SI";}else{$garaje = "NO";}
                if($reg["piscina"] == "S"){$piscina = "SI";}else{$piscina = "NO";}
                $direccion = $reg["direccion"];

                $display.="<tr>
                              <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$dni."','peticiones/eliminar_peticion.php')\"></a></td>
                              <td>".$nombre."</td>	
                              <td>".$dni."</td>
                              <td>".$telefono."</td>
                              <td>".$provincia."</td>
                              <td>".$localidad."</td>
                              <td>".$venta."</td>
                              <td>".$precio_venta."</td>
                              <td>".$alquiler."</td>
                              <td>".$precio_alquiler."</td>
                              <td>".$metros_cuadrados."</td>
                              <td>".$banios."</td>
                              <td>".$habitaciones."</td>
                              <td>".$terraza."</td>
                              <td>".$garaje."</td>
                              <td>".$piscina."</td>
                              <td>".$direccion."</td>
                            </tr>";
            }
        }
        
        $display.="</table></div>";
        mysqli_close($conexion);
        echo $display;
?>

