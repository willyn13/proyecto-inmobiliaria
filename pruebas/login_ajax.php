<?php
$conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h1>No Se Pudo Conectar: </h1>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h1>No Se Pudo Conectar: %s/n</h1>", mysqli_connect_error());
        exit();
    }

    $consulta="SELECT cargo FROM usuarios WHERE dni_usuario = '".$_POST['nombre']."' AND password = '".$_POST['clave']."'";
    
    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    if ($resultado == "admin"){
        echo "<h1>Cliente&nbsp;Actualizado</h1>";
        echo '<h1><a href="gestion_clientes.php"><input type="button" value="Aceptar"></a></h1>';
    } else {
        echo "<h1>Cliente&nbsp;No&nbsp;Actualizado</h1>";
        echo '<h1><a href="gestion_clientes.php"><input type="button" value="Aceptar"></a></h1>';
    }