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
        $consulta = "SELECT * FROM ventas";        
    } else {	
        $consulta = "SELECT * FROM ventas WHERE dni_usuario ='".$dni."'";
    }

    $display = '<div class="cls_gestiones"><h1>Gestión de Crompra-Venta</h1>';	
    
    $resultado1 = mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));

    $display.= '<table>
                <a><input type="button" id="id_alta_venta" name="alta_venta" value="Dar de Alta una Compra-Venta"></a>
                    <tr>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                        <th>ID CASA</th>
                        <th>FECHA COMPRA</th>
                        <th>PRECIO VENTA</th>
                        <th>DNI COMPRADOR</th>
                    </tr>';
     
     while($fila = mysqli_fetch_row($resultado1)){
        $IDCASA = $fila[0];
        $FECHACOMPRA = $fila[3];
        $PRECIOVENTA = $fila[4];
        $DNICOMPRADOR = $fila[1];
        
        $display.="<tr>
                        <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$IDCASA."','ventas/eliminar_venta.php')\"></a></td>
                    <td><a><input type='button' value='Modificar' onclick=\"ajaxSinFormulario('".$IDCASA."','ventas/form_modificar_venta.php')\"></a></td>
                        <td>".$IDCASA."</td>
                        <td>".$FECHACOMPRA."</td>
                        <td>".$PRECIOVENTA." €</td>
                        <td>".$DNICOMPRADOR."</td>
                  </tr>";
    }
    
    $display.="</table></div>";
    mysqli_close($conexion);
    echo $display;
?>