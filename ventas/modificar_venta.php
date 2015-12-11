<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    session_start();
    $dni = $_SESSION["dni"];
    $consulta="UPDATE ventas SET "
            . "fecha_compra='".$_POST['FECHACOMPRA']."',"
            . "precio_final=".$_POST['PRECIOVENTA'].","
            . "dni_comprador='".$_POST['DNICOMPRADOR']."'"
            . " WHERE idcasa=".$_POST['IDCASA']."";

    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); 

    if ($resultado === true){
        echo "</br><h2>Venta&nbsp;Actualizada</h2>";
        echo '<a href="gestion_ventas.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Venta&nbsp;No&nbsp;Actualizada</h2>";
        echo '<a href="gestion_ventas.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    }
?>
</div>