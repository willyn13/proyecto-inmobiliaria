<link type="text/css" rel="stylesheet" href="../css/style.css">
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>
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
            //$display.="<a href=\"http://localhost/proyecto-inmobiliaria/clientes/alta_cliente.php\"><input type='SUBMIT' id='id_alta_cliente' name='SUBMIT' value='Dar de Alta un Cliente'></a>";
            $display.="<a><input type='button' id='id_alta_cliente' name='SUBMIT' value='Dar de Alta un Cliente'></a>";
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
                              <td><a><input type='button' id='id_eliminar_cliente' value='Eliminar' onclick=\"ajaxSinFormulario('".$dni_cliente."','clientes/eliminar_cliente.php')\"></a></td>
                              <td><a><input type='button' id='id_modificar_cliente' value='Modificar' onclick=\"ajaxSinFormulario('".$dni_cliente."','clientes/modificar_cliente.php')\"></a></td>
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
<div id="confirmar"></div>