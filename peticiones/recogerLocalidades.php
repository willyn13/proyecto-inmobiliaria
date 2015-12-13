<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<?php
    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
            printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
            exit();
        }
    echo '</div>';

    echo '<option value="seleccion" selected="selected">Seleccione localidad</option>';

    $id_provincia = $_POST["id"];
    $consultaLoc = 'SELECT localidad FROM localidades WHERE idprovincia = '.$id_provincia;
    $resultadoLoc = mysqli_query($conexion,$consultaLoc) or die('Consulta fallida: ' . mysqli_error());
        while ($peticionLoc=mysqli_fetch_array($resultadoLoc)){
            echo "<option value=".$peticionLoc[0].">".$peticionLoc[0]."</option>";
        }
?>