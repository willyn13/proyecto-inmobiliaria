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
        $consulta = "SELECT * FROM clientes";        
    } else {	
        $consulta = "SELECT * FROM clientes";
    }
    
    $display = '<div class="cls_gestiones"><h1>Gestión de Clientes</h1>';	
    
    $resultado = mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));

    $display.="<table>";
        if (mysqli_num_rows($resultado) == 0 ){
            $display.='<p class="error">No hay Clientes</p>';
        } else {
            $display.="<a><input type='button' id='id_alta_cliente' name='alta_cliente' value='Dar de Alta un Cliente'></a>";
            $display.="<tr>
                          <th></th>
                          <th></th>
                          <th>DNI</th>
                          <th>NOMBRE</th>
                          <th>APELLIDOS</th>
                          <th>TELEFONO</th>
                          <th>EMAIL</th>
                       </tr>";
            while($reg = mysqli_fetch_array($resultado) ){
                $dni_cliente = $reg[0];
                $nombre = $reg[1];
                $apellidos = $reg[2];
                $telefono = $reg[3];
                $email = $reg[4];

                $display.="<tr>
                              <td><a><input type='button' value='Eliminar' onclick=\"ajaxSinFormulario('".$dni_cliente."','clientes/eliminar_cliente.php')\"></a></td>
                              <td><a><input type='button' value='Modificar' onclick=\"ajaxSinFormulario('".$dni_cliente."','clientes/form_modificar_cliente.php')\"></a></td>
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