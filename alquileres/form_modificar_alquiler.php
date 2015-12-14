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

    $sql_alquileres = "SELECT * FROM alquileres WHERE idcasa='".$_GET['dato']."'";	
    $resp_sql = mysqli_query($conexion,$sql_alquileres);

    $i = 0;
    while($datos = mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){break;}
        }
        $alquiler = $datos;
    }	
    
    $dni = $alquiler[2];

    setcookie('dni',$dni);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos</h1><br>
    <form id="formulario">
        <table>
            <tr>
                <th><label for="idcasa">Id Casa:</label></th>
                <td><input type="text" id="idcasa" placeholder="id Casa" name="IDCASA" maxlength="3" value="<?php echo $alquiler[0] ?>" required readonly="readonly"/></td>
            </tr>
            <tr>
                <th><label for="fechaInicio">Fecha Inicio:</label></th>
                <td><input type="text" id="fechaInicio" placeholder="Fecha Inicio" name="FECHAINICIO" maxlength="10" value="<?php echo $alquiler[3] ?>" required /></td>
            </tr>
            <tr>
                <th><label for="fechaFin">Fecha Fin:</label></th>
                <td><input type="text" id="fechaFin" placeholder="Fecha Fin" name="FECHAFIN" maxlength="10" value="<?php echo $alquiler[4] ?>" required /></td>
            </tr>
            <tr>
                <th><label for="precioAlquiler">Precio Alquiler:</label></th>
                <td><input type="text" id="precioAlquiler" placeholder="Precio Alquiler" name="PRECIOALQUILER" maxlength="4" value="<?php echo $alquiler[5] ?> " required/></td>
            </tr>		
            <tr>
                <th><label for="dniInquilino">DNI Inquilino:</label></th>
                <td><input type="text" id="dniInquilino" placeholder="DNI Inquilino" name="DNIINQUILINO" maxlength="9" value="<?php echo $alquiler[1] ?>" required/></td>
            </tr>
        </table>

        <input type="button" value="Guardar Cambios" name="modificar" onclick="ajaxFormulario('alquileres/modificar_alquiler.php', '#formulario')" />
        <input type="button" id="id_alquileres" value="Cancelar" />
    </form>
</div>    