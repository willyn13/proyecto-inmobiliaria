<?php
echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
            printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
            exit();
        }
    echo '</div>';
$consultaIdPro = 'SELECT idprovincia FROM provincias WHERE provincia = 1';
//echo $consultaIdPro;
    $resultadoIdPro = mysqli_query($conexion,$consultaIdPro) or die(mysql_error($conexion));
    if($resultadoIdPro){
        echo "Esta bien";
    }else{
        echo "Esta mal";
    }
    $peticionIdPro = mysqli_fetch_row($resultadoIdPro);
    echo $peticionIdPro[0];
    $consultaLoc = 'SELECT localidad FROM localidades WHERE idprovincia = '.$peticionIdPro[0];
    $resultadoLoc = mysqli_query($conexion,$consultaLoc) or die('Consulta fallida: ' . mysqli_error($conexion));
        while ($peticionLoc=mysqli_fetch_array($resultadoLoc)){
            echo "<option value=".$peticionLoc[0].">".$peticionLoc[0]."</option>";
        }
?>

