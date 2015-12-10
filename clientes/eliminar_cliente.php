<link type="text/css" rel="stylesheet" href="../css/style.css">
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>
<div class="cls_dialog">  
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h1>No Se Pudo Conectar: </h1>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h1>No Se Pudo Conectar: %s/n</h1>", mysqli_connect_error());
        exit();
    }
    
    $sql_delete="DELETE FROM clientes WHERE dni_cliente='".$_GET['dni_cliente']."'";
    
    $result=mysqli_query($conexion,$sql_delete) or die(mysqli_error($conexion));

    if($result===true){
        echo "<h1>Cliente&nbsp;Borrado</h1>";
        echo '<h1><a><input type="button" id="id_eliminar" value="Aceptar"></input></a></h1>';
    }else{
        echo "<h1>Cliente&nbsp;No&nbsp;Borrado</h1>";
        echo '<h1><a><input type="button" id="id_eliminar" value="Aceptar"></input></a></h1>';
    }
?>
</div>