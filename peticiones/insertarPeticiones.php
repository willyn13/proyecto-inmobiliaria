<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    $dni = $_SESSION["dni"];

    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
            printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error($conexion));
            exit();
        }

    $consulta = "INSERT INTO peticiones(nombre,dni,telefono,provincia,localidad,venta,precio_venta,alquiler,precio_alquiler,m2,banios,habitaciones,terraza,garaje,trastero,piscina,direccion) VALUES ('".$_POST['nombre']."','".$_POST['dni']."','".$_POST['telefono']."','".$_POST['provincia']."','".$_POST['localidad']."','".$_POST['venta']."','".$_POST['precio_venta']."','".$_POST['alquiler']."','".$_POST['precio_alquiler']."','".$_POST['m2']."','".$_POST['banios']."','".$_POST['habitaciones']."','".$_POST['terraza']."','".$_POST['garaje']."','".$_POST['trastero']."','".$_POST['piscina']."','".$_POST['direccion']."')";
 
    $resultado = mysqli_query($conexion,$consulta);
 
    $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";

    $result = mysqli_query($conexion,$sql);
    
    while($fila = mysqli_fetch_row($result)){
        $cargo = $fila[0];
    }
    
    if(($cargo == "Admin") || ($cargo == "Comercial")){
        if ($resultado === true){
            echo "</br><h2>Petición&nbsp;Registrada</h2>";
            echo '<a><input type="button" id="id_peticiones" value="Aceptar"></a>';
        } else {
            echo "</br><h2>Petición&nbsp;No&nbsp;Registrada</h2>";
            echo '<a><input type="button" id="id_peticiones" value="Aceptar"></a>';
        }
    } else {
        if ($resultado === true){
            echo "</br><h2>Petición&nbsp;Enviada</h2>";
            echo '<a href="/proyecto-inmobiliaria"><input type="button" value="Aceptar"></a>';
        } else {
            echo "</br><h2>Petición&nbsp;No&nbsp;Enviada</h2>";
            echo '<a href="/proyecto-inmobiliaria"><input type="button" value="Aceptar"></a>';
        }
    }
 echo '</div>';
?>