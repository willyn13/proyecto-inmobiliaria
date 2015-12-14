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
    
    $sql_ventas = "SELECT * FROM ventas WHERE idcasa='".$_GET['dato']."'";	
    $resp_sql = mysqli_query($conexion,$sql_ventas);

    $i = 0;
    while($datos = mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){break;}
        }
        $venta = $datos;
    }	
    
    $dni = $venta[2];

    setcookie('dni',$dni);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos</h1></br>
    <form id="formulario" >
        <table>
            <tr>
                <th><label for="idcasa">Id Casa</label></th>
                <td><input type="text" id="idcasa" placeholder="id Casa" maxlength="3" name="IDCASA" value="<?php echo $venta[0] ?>" required readonly="readonly"/></td>
            </tr>
            <tr>
                <th><label for="fechaCompra">Fecha Compra</label></th>
                <td><input type="text" id="fechaCompra" placeholder="Fecha Compra" maxlength="10" name="FECHACOMPRA" value="<?php echo $venta[3] ?>" required /></td>
            </tr>
            <tr>
                <th><label for="precioVenta">Precio Venta</label></th>
                <td><input type="text" id="precioVenta" placeholder="Precio Venta" maxlength="8" name="PRECIOVENTA" value="<?php echo $venta[4] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="dniComprador">DNI Comprador</label></th>
                <td><input type="text" id="dniComprador" placeholder="DNI Comprador" maxlength="10" name="DNICOMPRADOR" value="<?php echo $venta[1] ?>" required /></td>
            </tr>	
        </table>
        
        <input type="button" value="Guardar Cambios" name="modificar" onclick="ajaxFormulario('ventas/modificar_venta.php', '#formulario')" />
        <input type="button" id="id_ventas" value="Cancelar" />
    </form>
</div>	