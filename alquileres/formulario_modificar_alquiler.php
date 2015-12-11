<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    $IDCASA = $_GET["IDCASA"];
    $FECHAINICIO = $_GET["FECHAINICIO"];
    $FECHAFIN = $_GET["FECHAFIN"];
    $PRECIOALQUILER = $_GET["PRECIOALQUILER"];
    $DNIINQUILINO = $_GET["DNIINQUILINO"];
?>
</div>

<div class="cls_gestiones">
        <form id="formulario" action="modificar_alquiler.php" method="POST">
        <h1>Modificar Datos</h1>
        <table>
            <tr>
                <th><label for="idcasa">Id Casa</label></th>
                <td><input type="text" id="idcasa" placeholder="id Casa" maxlength="3" name="IDCASA" value="<?php echo $IDCASA ?>" required readonly="readonly"/></td>
            </tr>
            <tr>
                <th><label for="fechaInicio">Fecha Inicio</label></th>
                <td><input type="text" id="fechaInicio" placeholder="Fecha Inicio" maxlength="10" name="FECHAINICIO" value="<?php echo $FECHAINICIO ?>" required /></td>
            </tr>
            <tr>
                <th><label for="fechaFin">Fecha Fin</label></th>
                <td><input type="text" id="fechaFin" placeholder="Fecha Fin" maxlength="10" name="FECHAFIN" value="<?php echo $FECHAFIN ?>" required /></td>
            </tr>
            <tr>
                <th><label for="precioAlquiler">Precio Alquiler</label></th>
                <td><input type="text" id="precioAlquiler" placeholder="Precio Alquiler" maxlength="4" name="PRECIOALQUILER" value="<?php echo $PRECIOALQUILER ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="dniInquilino">DNI Inquilino</label></th>
                <td><input type="text" id="dniInquilino" placeholder="DNI Inquilino" maxlength="9" name="DNIINQUILINO" value="<?php echo $DNIINQUILINO ?>" required/></td>
            </tr>
        </table>
        <a href="modificar_alquiler.php"><input type="submit" id="id_modificar" value="Guardar Cambios" name="modificar"/></a>
        <a href="gestion_alquileres.php"><input type="button" value="Cancelar"></a>
    </form>
</div>    