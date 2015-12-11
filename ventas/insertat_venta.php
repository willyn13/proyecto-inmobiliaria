<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h2>No Se Pudo Conectar: %s/n</h2>", mysqli_connect_error());
        exit();
    }

    session_start();
    $dni = $_SESSION["dni"];
    $sql ="INSERT INTO ventas(idcasa,dni_comprador,dni_usuario,fecha_compra,precio_final) VALUES (".$_POST["idcasa"].",'".$_POST["dnipropietario"]."','".$dni."',".$_POST["FECHACOMPRA"]."',".$_POST["PRECIOVENTA"].")";

    $resultado = mysqli_query($conexion,$sql);

    if ($resultado===true){
        echo "</br><h2>Venta&nbsp;Registrada</h2>";
        echo '<a href="gestion_ventas.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Venta&nbsp;No&nbsp;Registrada</h2>";
        echo '<a href="gestion_ventas.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    }
    
    mysqli_close($conexion);
?>
</div>