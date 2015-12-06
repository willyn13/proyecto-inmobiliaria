<link type="text/css" rel="stylesheet" href="../css/style.css">
<?php
echo '<div class="cls_dialog">';
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h1>No Se Pudo Conectar: </h1>' . mysqli_error());

    if (mysqli_connect_error()) {
            printf('<h1>No Se Pudo Conectar: %s/n</h1>', mysqli_connect_error());
            exit();
    }
echo '</div>';
    $display='<div class="cls_gestiones"><h1>Gestión de Clientes</h1></br>';	

    $consulta = 'SELECT * FROM clientes';
    $resultado= mysqli_query($conexion,$consulta)
    or die('Consulta fallida: ' . mysqli_error());

    $display.="<table>";
        if (mysqli_num_rows($resultado)==0 ){
            $display.='<p class="error"><i>No hay Clientes</i></p>';
        } else {
            $display.="<a href=\"clientes/alta_cliente.php\"><input type='SUBMIT' name='SUBMIT' value='Dar de Alta un Cliente'></a>";
            $display.="<tr>
                          <th></th>
                          <th></th>
                          <th>DNI</th>
                          <th>NOMBRE</th>
                          <th>APELLIDOS</th>
                          <th>TELEFONO</th>
                          <th>EMAIL</th>
                       </tr>";

            while($reg=mysqli_fetch_array($resultado) ){
                $dni_cliente=$reg[0];
                $nombre=$reg[1];
                $apellidos=$reg[2];
                $telefono=$reg[3];
                $email=$reg[4];

                $display.="<tr>
                              <td><a href=\"clientes/eliminar_cliente.php?dni_cliente=".$dni_cliente."\"><input type='button' value='Eliminar'></a></td>
                              <td><a href=\"clientes/modificar_cliente.php?dni_cliente=".$dni_cliente."\"><input type='button' value='Modificar'></a></td>
                              <td>".$dni_cliente."</td>	
                              <td>".$nombre."</td>
                              <td>".$apellidos."</td>
                              <td>".$telefono."</td>
                              <td>".$email."</td>
                          </tr>";
            }
        }

    $display.="</table></div>";
        mysqli_close($conexion);
        echo $display;
?>