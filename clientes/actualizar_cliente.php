<link type="text/css" rel="stylesheet" href="http://localhost/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h2>No Se Pudo Conectar: %s/n</h2>", mysqli_connect_error());
        exit();
    }
    
    $consulta="UPDATE clientes SET"
            . "dni_cliente ='".$_POST['dni_cliente']."',"
            . "nombre='".$_POST['nombre']."',"
            . "apellidos='".$_POST['apellidos']."',"
            . "telefono='".$_POST['telefono']."',"
            . "email='".$_POST['email']."'"
            . "WHERE dni_cliente='".$_POST['dni']."' ";
    
    $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    if ($resultado===true){
        echo "</br><h2>Cliente&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_actualizar" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Cliente&nbsp;No&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_actualizar" value="Aceptar"></a>';
    }
?>
</div>