<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

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
    $consulta = "UPDATE alquileres SET "
                . "fecha_inicio='".$_POST['FECHAINICIO']."',"
                . "fecha_fin='".$_POST['FECHAFIN']."',"
                . "precio_final=".$_POST['PRECIOALQUILER'].","
                . "dni_inquilino='".$_POST['DNIINQUILINO']."'"
                . " WHERE idcasa=".$_POST['IDCASA']."";

    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); 

    if ($resultado === true){
        echo "</br><h2>Alquiler&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_alquileres" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Alquiler&nbsp;No&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_alquileres" value="Aceptar"></a>';
    }
?>
</div>