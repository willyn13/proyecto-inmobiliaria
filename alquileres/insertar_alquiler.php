<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">    
<?php
session_start();
$dni = $_SESSION["dni"];
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h2>No Se Pudo Conectar: %s/n</h2>", mysqli_connect_error());
        exit();
    }
    
    $sql = "INSERT INTO alquileres(idcasa,dni_inquilino,dni_usuario ,fecha_nicio,fecha_fin,precio_final)"
            . " VALUES (".$_POST["IDCASA"].",'".$_POST["DNIINQUILINO"]."','".$dni."','".$_POST["FECHAINICIO"]."','".$_POST["FECHAFIN"]."',".$_POST["PRECIOFINAL"].")";

    $resultado = mysqli_query($conexion,$sql);

    if ($resultado === true){
        echo "</br><h2>Alquiler&nbsp;Registrado</h2>";
        echo '<a href="gestion_alquileres.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Alquiler&nbsp;No&nbsp;Registrado</h2>";
        echo '<a href="gestion_alquileres.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    }
    
    mysqli_close($conexion);
?>
</div>