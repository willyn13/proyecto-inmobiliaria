<link type="text/css" rel="stylesheet" href="http://localhost/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>

<?php
    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
                printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
                exit();
        }
    echo '</div>';

    $display = '<div class="cls_gestiones"><h1>Gestión de Crompra-Venta</h1>';	
    
    session_start();
    
    $dni = $_SESSION["MM_Username"];
    $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";
    $result = mysqli_query($conexion,$sql);
    
    while($fila = mysqli_fetch_row($result)){
        $cargo=$fila[0];
    }
    
    if($cargo == "admin"){
        $consulta = "SELECT * FROM ventas";        
    } else {
        $sql1 = "SELECT zona FROM usuarios WHERE dni='".$dni."'";
        $result1 = mysqli_query($conexion,$sql1);
        
        while($fila = mysqli_fetch_row($result1)){
            $zona = $fila[0];
        }	
        $consulta = "SELECT * FROM ventas WHERE dni_usuario ='".$dni."'";
    }

    $resultado1 = mysqli_query($conexion,$consulta);

    while($fila = mysqli_fetch_row($resultado1)){
        $IDCASA = $fila[0];
        $FECHACOMPRA = $fila[2];
        $PRECIOVENTA = $fila[3];
        $DNICOMPRADOR = $fila[1];
        $display.= "<table id='tabladatos' border='1'> \n
                        <tr>
                            <th>&nbsp</th>
                            <th>&nbsp</th>
                            <th>ID CASA</th>
                            <th>FECHA DE COMPRA</th>
                            <th>PRECIO DE VENTA</th>
                            <th>DNI DEL COMPRADOR</th>
                        </tr>";
        $display.="<tr>
                        <td><A HREF=\"eliminarventas.php?IDCASA=".$IDCASA."&&FECHACOMPRA=".$FECHACOMPRA."\">Eliminar venta</A></td>
                        <td><A HREF=\"formulariomodificarventas.php?IDCASA=".$IDCASA."&&FECHACOMPRA=".$FECHACOMPRA."&&PRECIOVENTA=".$PRECIOVENTA."&&DNICOMPRADOR=".$DNICOMPRADOR."\">Modificar venta</A></td>
                        <td>".$IDCASA."</td>
                        <td>".$FECHACOMPRA."</td>
                        <td>".$PRECIOVENTA."</td>
                        <td>".$DNICOMPRADOR."</td>
                  </tr>";
    }
    
    $display.="</table></div>";
    
    echo $display;
    echo "<a href='formularioaltaventa.php'>ALTA DE VENTAS</a>";
    echo "<P><a href=\"principal.php\"><img src='home.png' alt='arriba' WIDTH='100' HEIGHT='100' border='0'>";
    echo "</br>";
?>
