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

    $sql_peticion = "SELECT * FROM peticiones WHERE dni='".$_GET['dato']."'";	
    $respuesta = mysqli_query($conexion,$sql_peticion);

    $i = 0;
    while($datos = mysqli_fetch_row($respuesta)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){break;}
        }
        $peticiones = $datos;
    }	
    
    $dni = $peticiones[1];

    setcookie('dni',$dni);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos Peticiones</h1><br>
    <form id="formulario">
        <table>
            <tr>
                <th><label for="nombre">Nombre:</label></th>
                <td><input type="text" id="nombre" placeholder="Nombre" name="nombre" maxlength="9" value="<?php echo $peticiones[0] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="dni">DNI: </label></th>
                <td><input type="text" id="dni" placeholder="DNI" name="dni" maxlength="10" value="<?php echo $peticiones[1] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="telefono">Teléfono:</label></th>
                <td><input type="text" id="telefono" placeholder="Teléfono" name="telefono" maxlength="9" value="<?php echo $peticiones[2] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="provincia">Provincia:</label></th>
                <td>
                <select name="provincia" id="provincia">
                    <!--<option value="seleccion" selected="selected"><?php echo $peticiones[3] ?></option>
                    <?php
                    $consultaPro = 'SELECT idprovincia,provincia FROM provincias';
                    $resultadoPro = mysqli_query($conexion,$consultaPro) or die('Consulta fallida: ' . mysqli_error());
                        while ($peticionPro=mysqli_fetch_array($resultadoPro)){
                            echo "<option value=".$peticionPro[0].">".$peticionPro[1]."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
        </table>
        
        <input type="button" value="Guardar Cambios" name="modificar" onclick="ajaxFormulario('petciones/modificar_peticion.php', '#formulario')" />
        <input type="button" id="id_clientes" value="Cancelar" />
    </form>
</div>
