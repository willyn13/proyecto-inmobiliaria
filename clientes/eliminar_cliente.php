<link type="text/css" rel="stylesheet" href="../css/style.css">
<div class="cls_dialog">  
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h1>No Se Pudo Conectar: </h1>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h1>No Se Pudo Conectar: %s/n</h1>", mysqli_connect_error());
        exit();
    }

    $sql_delete="DELETE FROM clientes WHERE dni_cliente='".$_GET['dni_cliente']."'";
    
    echo "<br/>";
    $result=mysqli_query($conexion,$sql_delete);

    if($result===true){
        echo "<h1>Cliente&nbsp;Borrado</h1>";
        //echo '<h1><a href="gestion_clientes.php"><input type="button" value="Aceptar"></a></h1>';
        echo '<h1><a><input type="button" id="id_eliminar" value="Aceptar"></input></a></h1>';
    } //else {
//        echo "<h1>Cliente&nbsp;No&nbsp;Borrado</h1>";
//        echo '<h1><a href="gestion_clientes.php"><input type="button" value="Aceptar"></a></h1>';
//    }
?>
</div>