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

    $consulta="UPDATE usuarios SET "
            . "dni_usuario ='".$_POST['dni_usuario']."',"
            . "idzona= '".$_POST['zona']."',"
            . "nombre= '".$_POST['nombre']."',"
            . "apellidos= '".$_POST['apellidos']."',"
            . "cargo= '".$_POST['cargo']."',"
            . "password= '".$_POST['password']."'"
            . " WHERE dni_usuario= '".$_COOKIE['dni_usuario']."'";

    $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    if ($resultado === true){
        echo "</br><h2>Usuario&nbsp;Actualizado</h2>";
        echo '<a href="gestion_usuarios.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Usuario&nbsp;No&nbsp;Actualizado</h2>";
        echo '<a href="gestion_usuarios.php"><input type="button" id="id_actualizar" value="Aceptar"></a>';
    }
?>
</div>