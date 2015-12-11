<link type="text/css" rel="stylesheet" href="../css/style.css"/>
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
    
    $display = '<div class="cls_gestiones"><h1>Gestión de Usuarios</h1>';	

    $consulta = 'SELECT * FROM usuarios';
    $resultado = mysqli_query($conexion,$consulta)
    or die('Consulta fallida: ' . mysqli_error());

    $display.= "<table>";
        if (mysqli_num_rows($resultado) == 0 ){
            $display.="<p class=\"error\"><i>No hay comerciales.</i></p>";
        } else{
            $display.="<a href=\"form_alta_usuario.php\"><input type='submit' name='submit' value='Dar de Alta un Usuario'></a>";
            $display.="<tr>
                    <th></th>
                    <th></th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>CARGO</th>
                    <th>ZONA</th>	
                    </tr>";


        while($reg=mysqli_fetch_array($resultado) ){
            $dni_usuario=$reg[0];
            $zona=$reg[1];
            $nombre=$reg[2];
            $apellidos=$reg[3];
            $cargo=$reg[4];

            $display.="<tr>
                         <td><a href=\"eliminar_usuario.php?dni_usuario=".$dni_usuario."\"><input type='button' id='id_eliminar_usuario' value='Eliminar'></a></td>
                         <td><a href=\"form_modificar_usuario.php?dni_usuario=".$dni_usuario."\"><input type='button' id='id_modificar_usuario' value='Modificar'></a></td>
                         <td>".$dni_usuario."</td>	
                         <td>".$nombre."</td>
                         <td>".$apellidos."</td>
                         <td>".$cargo."</td>
                         <td>".$zona."</td>
                      </tr>";
        }	
    }
    
    $display.="</table></div>";
    mysqli_close($conexion);
    echo $display;
?>