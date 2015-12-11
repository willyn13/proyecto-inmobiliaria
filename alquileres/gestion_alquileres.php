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
    $_SESSION["dni"] = $_POST["dni"];
    $dni = $_SESSION["dni"];
    $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";

    $result = mysqli_query($conexion,$sql);
    while($fila = mysqli_fetch_row($result)){
        $cargo = $fila[0];
    }
    
    if($cargo == "Admin"){
        $consulta = "SELECT * FROM alquileres";        
    } else {
        $sql1 = "SELECT zona FROM usuarios WHERE dni_usuario='".$dni."'";
        $result1 = mysqli_query($conexion,$sql1);
        while($fila = mysqli_fetch_row($result1)){
            $zona = $fila[0];
        }	
        $consulta = "SELECT * FROM alquileres"; //WHERE dni_usuario='".$dni."'";
    }

    $display = '<div class="cls_gestiones"><h1>Gestión de Alquileres</h1>';	
    
    $resultado1 = mysqli_query($conexion,$consulta);

    $display.= '<table>
                <a href="formulario_alta_alquiler.php"><input type="submit" id="id_alta_alquiler" name="submit" value="Dar de Alta un Alquiler"></a>
                <tr>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                    <th>ID CASA</th>
                    <th>FECHA DE INICIO</th>
                    <th>FECHA DE FIN</th>
                    <th>PRECIO DE ALQUILER</th>
                    <th>DNI DEL INQUILINO</th>
                </tr>';
        
    while($fila = mysqli_fetch_row($resultado1)){
        $IDCASA = $fila[0];
        $FECHAINICIO = $fila[3];
        $FECHAFIN = $fila[4];
        $PRECIOALQUILER = $fila[5];
        $DNIINQUILINO = $fila[1];

        $display.="<tr>
                    <td><a href=\"eliminar_alquiler.php?IDCASA=".$IDCASA."&&FECHAINICIO=".$FECHAINICIO."&&FECHAFIN=".$FECHAFIN."\"><input type=\"button\" id=\"id_eliminar_alquiler\" value=\"Eliminar\"/></a></td>
                    <td><a href=\"formulario_modificar_alquiler.php?IDCASA=".$IDCASA."&&FECHAINICIO=".$FECHAINICIO."&&FECHAFIN=".$FECHAFIN."&&PRECIOALQUILER=".$PRECIOALQUILER."&&DNIINQUILINO=".$DNIINQUILINO."\"><input type=\"button\" id=\"id_modificar_alquiler\" value=\"Modificar\"/></a></td>
                    <td>".$IDCASA."</td>
                    <td>".$FECHAINICIO."</td>
                    <td>".$FECHAFIN."</td>
                    <td>".$PRECIOALQUILER."</td>
                    <td>".$DNIINQUILINO."</td>
                  </tr>";
    }
    
    $display.="</table></div>";
    mysqli_close($conexion);
    echo $display;
?>