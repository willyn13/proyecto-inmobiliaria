<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">  
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_error()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    $sql_delete = "DELETE FROM alquileres WHERE idcasa=".$_GET['IDCASA']." AND fecha_inicio='".$_GET['FECHAINICIO']."' AND fecha_fin='".$_GET['FECHAFIN']."'";

    $result = mysqli_query($conexion,$sql_delete);

    if($result === true){
        echo "</br><h2>Alquiler&nbsp;Borrado</h2>";
        echo '<a href="gestion_alquileres.php"><input type="button" id="id_eliminar" value="Aceptar"></a>';
    }else{
        echo "</br><h2>Alquiler&nbsp;No&nbsp;Borrado</h2>";
        echo '<a href="gestion_alquileres.php"><input type="button" id="id_eliminar" value="Aceptar"></a>';
    }
?>
</div>