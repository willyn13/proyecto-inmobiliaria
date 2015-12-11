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
    $FECHACOMPRA = $_GET["FECHACOMPRA"];
    $PRECIOVENTA = $_GET["PRECIOVENTA"];
    $DNICOMPRADOR = $_GET["DNICOMPRADOR"];
?>
</div>

<div class="cls_gestiones">
        <form id="formulario" action="modificar_venta.php" method="POST">
        <h1>Modificar Datos</h1>
        <table>
            <tr>
                <th><label for="idcasa">Id Casa</label></th>
                <td><input type="text" id="idcasa" placeholder="id Casa" maxlength="3" name="IDCASA" value="<?php echo $IDCASA ?>" required readonly="readonly"/></td>
            </tr>
            <tr>
                <th><label for="fechaCompra">Fecha Compra</label></th>
                <td><input type="text" id="fechaCompra" placeholder="Fecha Compra" maxlength="10" name="FECHACOMPRA" value="<?php echo $FECHACOMPRA ?>" required /></td>
            </tr>
            <tr>
                <th><label for="precioVenta">Precio Venta</label></th>
                <td><input type="text" id="precioVenta" placeholder="Precio Venta" maxlength="8" name="PRECIOVENTA" value="<?php echo $PRECIOVENTA ?>" required/></td>
            </tr>
            <tr>
                <th><label for="dniComprador">DNI Comprador</label></th>
                <td><input type="text" id="dniComprador" placeholder="DNI Comprador" maxlength="10" name="DNICOMPRADOR" value="<?php echo $DNICOMPRADOR ?>" required /></td>
            </tr>	
        </table>
        <a href="modificar_venta.php"><input type="submit" id="id_modificar" value="Guardar Cambios" name="modificar"/></a>
        <a href="gestion_ventas.php"><input type="button" value="Cancelar"/></a>
    </form>
</div>	