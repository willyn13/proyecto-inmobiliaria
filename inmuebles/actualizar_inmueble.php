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

/*`idcasa`=[value-1],`idlocalidad`=[value-2],`dni_propietario`=[value-3],`venta`=[value-4],`alquiler`=[value-5],
`habitaciones`=[value-6],`m2`=[value-7],`banios`=[value-8],`terraza`=[value-9],`trastero`=[value-10],`piscina`=[value-11],
`garaje`=[value-12],`direccion`=[value-13],`precio_venta`=[value-14],`precio_alquiler`=[value-15] WHERE 1
*/
    
    session_start();
    $dni = $_SESSION["dni"];
    $consulta = "UPDATE inmuebles SET 
                idlocalidad=".$_POST['idlocalidad'].",
                dni_propietario='".$_POST['dni_propietario']."',
                venta='".$_POST['venta']."', 
                alquiler='".$_POST['alquiler']."', 
                habitaciones='".$_POST['habitaciones']."',
                m2='".$_POST['m2']."',
                banios='".$_POST['banios']."',
                terraza='".$_POST['terraza']."',
                trastero='".$_POST['trastero']."',
                piscina='".$_POST['piscina']."',
                garaje='".$_POST['garaje']."',
                direccion='".$_POST['direccion']."',
                precio_venta=".$_POST['precio_venta'].",
                precio_alquiler=".$_POST['precio_alquiler']."
                WHERE idcasa=".$_POST['idcasa'];

$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion)); ;


    if ($resultado === true){
        echo "</br><h2>Inmueble&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Inmueble&nbsp;No&nbsp;Actualizado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    }
?>
</div>