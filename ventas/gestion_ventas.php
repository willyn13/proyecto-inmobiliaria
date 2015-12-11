<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<?php
    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
                printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
                exit();
        }
    echo '</div>';
    
    session_start();
    $dni = $_SESSION["dni"];
    $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";
    $result = mysqli_query($conexion,$sql);
    
    while($fila = mysqli_fetch_row($result)){
        $cargo=$fila[0];
    }
    
    if($cargo == "Admin"){
        $consulta = "SELECT * FROM ventas";        
    } else {
        $sql1 = "SELECT zona FROM usuarios WHERE dni='".$dni."'";
        $result1 = mysqli_query($conexion,$sql1);
        
        while($fila = mysqli_fetch_row($result1)){
            $zona = $fila[0];
        }	
        $consulta = "SELECT * FROM ventas";// WHERE dni_usuario ='".$dni."'";
    }

    $display = '<div class="cls_gestiones"><h1>Gestión de Crompra-Venta</h1>';	
    
    $resultado1 = mysqli_query($conexion,$consulta);

     $display.= '<table>
                <a href="form_insertar_venta.php"><input type="submit" id="id_alta_venta" name="submit" value="Dar de Alta una Compra-Venta"></a>
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
                        <td><a href=\"eliminar_venta.php?IDCASA=".$IDCASA."&&FECHACOMPRA=".$FECHACOMPRA."\"><input type=\"button\" id=\"id_eliminar_venta\" value=\"Eliminar\"/></a></td>
                        <td><a href=\"form_modificar_venta.php?IDCASA=".$IDCASA."&&FECHACOMPRA=".$FECHACOMPRA."&&PRECIOVENTA=".$PRECIOVENTA."&&DNICOMPRADOR=".$DNICOMPRADOR."\"><input type=\"button\" id=\"id_modificar_venta\" value=\"Modificar\"/></a></td>
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