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

    $sql_delete = "DELETE FROM usuarios WHERE dni_usuario='".$_GET['dni_usuario']."'";
    
    $result=mysqli_query($conexion,$sql_delete);
    
    if($result === true){
        echo "</br><h2>Usuario&nbsp;Borrado</h2>";
        echo '<a href="gestion_usuarios.php"><input type="button" id="id_eliminar" value="Aceptar"></a>';
    }else{
        echo "</br><h2>Usuario&nbsp;No&nbsp;Borrado</h2>";
        echo '<a href="gestion_usuarios.php"><input type="button" id="id_eliminar" value="Aceptar"></a>';
    }
?>
</div>