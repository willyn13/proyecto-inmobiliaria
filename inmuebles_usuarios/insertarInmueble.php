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
  
    $dni = $_SESSION["dni"];
    $cargo = "";
    $zona = "";
    $sql = "SELECT cargo, idzona FROM usuarios WHERE dni_usuario='".$dni."'";
    
    $result = mysqli_query($conexion,$sql);
    
    while($fila = mysqli_fetch_row($result)){
       $cargo = $fila[0];
       $zona = $fila[1];
    }
?>
</div>

<div class="cls_gestiones"> 
    <h1>Dar De Alta Nuevo Inmueble</h1><br>
    <form name="form1" id="form1">
        <table> 
            <tr>
                <th> Venta: </th>
                <td>
                    <select name="venta">
                        <option value= selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr> 
            <tr>
                <th> Alquiler: </th>
                <td>
                    <select name="alquiler">
                        <option selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> Habitaciones: </th>
                <td><input type="text" name="habitaciones" maxlength="2" placeholder="Habitaciones" required=""/></td>
            </tr>
            <tr>
                <th>Metros Cuadrados:</th>
                <td><input type="text" name="m2" maxlength="3" placeholder="Metros Cuadrados" required=""/></td>
            </tr>
            <tr>
                <th> Baños: </th>
                <td><input type="text" name="banios" maxlength="1" placeholder="Baños" required=""/></td>
            </tr>
            <tr>
                <th> Terraza: </th>
                <td>
                    <select name="terraza">
                        <option selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> Trastero: </th>
                <td>
                    <select name="trastero">
                        <option selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> Piscina: </th>
                <td>
                    <select name="piscina">
                        <option selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> Garaje: </th>
                <td>
                    <select name="garaje">
                        <option selected></option>
                        <option value=0 >NO</option>
                        <option value=1 >SI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> Dirección: </th>
                <td><input type="text" name="direccion" value="" maxlength="50" placeholder="Dirección" required=""/></td>
            </tr>
            <tr>
                <th> Localidad: </th>
                <td>
                    <select name="localidad">
                        <option selected>Seleccione Localidad</option>
<?php	
                        $dni = $_SESSION['dni'];
                        if($cargo == "Admin"){
                            $consulta = "SELECT idlocalidad,localidad FROM localidades";       
                        } else {
                            $consulta = "SELECT idlocalidad,localidad FROM localidades WHERE idlocalidad=".$zona;
                        }

                        $resultado = mysqli_query($conexion,$consulta);
                        while ($localidad = mysqli_fetch_array($resultado)){
                            echo "<option value='".$localidad[0]."'>".$localidad[1]."</option>";
                        }
?> 
                    </select>
                </td>
            </tr>
            <tr>
                <th> Precio Venta: </th>
                <td><input type="text" name="precio_venta" value="" maxlength="8" placeholder="Precio Venta" required=""/></td>
            </tr>
            <tr>
                <th> Precio Alquiler: </th>
                <td><input type="text" name="precio_alquiler" value="" maxlength="4" placeholder="Precio Alquiler" required=""/></td>
            </tr>
            <tr>
                <th> Insertar Imagenes: </th>
                <td><input type="file" name="imagen[]" multiple='multiple' /></td>
            </tr>
            <tr>
                <th> DNI Propietario: </th>
                <td>
                    <select name="dnipropietario">
                        <option value="Error" selected>Seleccione Propietario</option>
<?php                
                        $consulta = "SELECT dni_cliente, nombre, apellidos FROM clientes";
                        $resultado = mysqli_query($conexion,$consulta);
                        while ($cliente = mysqli_fetch_array($resultado)){
                            echo "<option value='".$cliente[0]."'>".$cliente[1].", ".$cliente[2]."</option>";
                        }
?>
                    </select>
                </td>
            </tr>
        </table>

        <input type="button" value="Insertar Inmueble" onclick="validarInmuebles()" />
        <input type="button" id="id_inmuebles" value="Cancelar" />
        <input type="hidden" name="MM_insert" value="form1" />
    </form>
</div>
