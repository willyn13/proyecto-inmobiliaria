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
    <h1>Modificar Datos</h1><br>
    <form action="modificar_alquiler.php" method="POST">
        <table>
            <tr>
                <th><label for="idcasa">Id Casa</label></th>
                <td><input type="text" id="idcasa" placeholder="id Casa" name="IDCASA" maxlength="3" value="<?php echo $IDCASA ?>" required readonly="readonly"/></td>
            </tr>
            <tr>
                <th><label for="fechaInicio">Fecha Inicio</label></th>
                <td><input type="text" id="fechaInicio" placeholder="Fecha Inicio" name="FECHAINICIO" maxlength="10" value="<?php echo $FECHAINICIO ?>" required /></td>
            </tr>
            <tr>
                <th><label for="fechaFin">Fecha Fin</label></th>
                <td><input type="text" id="fechaFin" placeholder="Fecha Fin" name="FECHAFIN" maxlength="10" value="<?php echo $FECHAFIN ?>" required /></td>
            </tr>
            <tr>
                <th><label for="precioAlquiler">Precio Alquiler</label></th>
                <td><input type="text" id="precioAlquiler" placeholder="Precio Alquiler" name="PRECIOALQUILER" maxlength="4" value="<?php echo $PRECIOALQUILER ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="dniInquilino">DNI Inquilino</label></th>
                <td><input type="text" id="dniInquilino" placeholder="DNI Inquilino" name="DNIINQUILINO" maxlength="9" value="<?php echo $DNIINQUILINO ?>" required/></td>
            </tr>
        </table>

        <input type="submit" id="id_modificar" value="Guardar Alquiler" name="modificar"/>
        <a href="gestion_alquileres.php"><input type="button" id="id_cancelar" value="Cancelar" name="cancelar"/></a>
        <input type="hidden" name="MM_insert" value="form1"/>
    </form>
</div>    