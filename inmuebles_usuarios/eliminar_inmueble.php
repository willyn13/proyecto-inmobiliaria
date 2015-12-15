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

    $sql_delete = "DELETE FROM inmuebles WHERE idcasa='".$_GET['dato']."'";
    
    $result = mysqli_query($conexion,$sql_delete);
    
    if($result === true){
        echo "</br><h2>Inmueble&nbsp;Borrado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    }else{
        echo "</br><h2>Inmueble&nbsp;No&nbsp;Borrado</h2>";
        echo '<a><input type="button" id="id_inmuebles" value="Aceptar"></a>';
    }
?>
</div>