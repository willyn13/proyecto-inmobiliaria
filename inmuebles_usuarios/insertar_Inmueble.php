<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">
<?php 
    session_start();
    require_once('../conexiones/conexion_inmobiliaria.php');
    
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }
		
    $sql = "INSERT INTO inmuebles ( `idlocalidad`, `dni_propietario`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`,`terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`) VALUES ( ".$_POST["localidad"].",'".$_POST["dnipropietario"]."','".$_POST["venta"]."','".$_POST["alquiler"]."','".$_POST["habitaciones"]."','".$_POST["m2"]."','".$_POST["banios"]."',' ".$_POST["terraza"]."', '".$_POST["trastero"]."','".$_POST["piscina"]."','".$_POST["garaje"]."', '".$_POST["direccion"]."',".$_POST["precio_venta"].",".$_POST["precio_alquiler"].")";
    
	$res = mysqli_query($conexion,$sql);
        
    if ($res === true){
        echo "</br><h2>Inmueble&nbsp;Insertado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    } else {
        echo "</br><h2>Inmueble&nbsp;No&nbsp;Insertado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    }
?>
</div>