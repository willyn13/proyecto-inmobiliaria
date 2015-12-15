<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    $dni = $_SESSION["dni"];

    echo '<div class="cls_dialog">';
        $conexion = mysqli_connect('localhost','root','','inmobiliaria')
        or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

        if (mysqli_connect_error()) {
            printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
            exit();
        }
        
    echo '</div>';
?>
        <div class="cls_gestiones">
            <h1>Dar de Alta una Petición</h1>
            <form name="form1" id="form1">
<?php                
                $sql = "SELECT cargo,idzona FROM usuarios WHERE dni_usuario='".$dni."'";

                $result = mysqli_query($conexion,$sql);
                while($fila = mysqli_fetch_row($result)){
                    $cargo = $fila[0];
                }

                if(($cargo == "Admin") || ($cargo == "Comercial")){
                    echo '<input type="button" id="id_peticiones" value="Cancelar" />';
                } else {
                     echo '<a href="/proyecto-inmobiliaria"><input type="button" value="Cancelar"></a>';
                }
?>
                <table>
                    <tr>
                        <th>Nombre:</th>
                        <td><input type="text" name="nombre" placeholder="Nombre" maxlength="40" required=""/></td>
                    </tr>
                    <tr>
                        <th>DNI:</th>
                        <td><input type="text" name="dni" placeholder="DNI" maxlength="9" required=""/></td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td><input type="text" name="telefono" placeholder="Teléfono" maxlength="9" required="" /></td>
                    </tr>
                    <tr>  
                        <th>Provincia:</th>
                        <td>
                            <select name="provincia" id="provincia">
                                <option value="" selected>Seleccione Provincia</option>
 <?php
                                $consulta = "SELECT idprovincia,provincia FROM provincias";
                                
                                $resultado = mysqli_query($conexion,$consulta);
                                
                                while ($provincia = mysqli_fetch_array($resultado)){
                                        echo "<option value='".$provincia[0]."'>".$provincia[1]."</option>";
                                    }
?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Localidad:</th>
                        <td>
                            <select name="localidad" id="localidad">
                                <option selected>Seleccione Localidad</option>
<?php	
                                $consulta = "SELECT idlocalidad,localidad FROM localidades";// WHERE idprovincia = (SELECT idprovincia FROM provincias WHERE provincia='".$POST['localidad']."')";  
                                $resultado = mysqli_query($conexion,$consulta);
                                while ($localidad = mysqli_fetch_array($resultado)){
                                    echo "<option value='".$localidad[0]."'>".$localidad[1]."</option>";
                                }
?> 
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Venta:</th>
                        <td>
                            <select name="venta" id="venta">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>P.V.P.</th>
                        <td><input type="text" name="precio_venta" placeholder="Precio Venta" maxlength="8" required=""/></td>
                    </tr>
                    <tr>
                        <th>Alquiler:</th>
                        <td>
                            <select name="alquiler" id="alquiler">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                         <th>P.A.P.</th>
                         <td><input type="text" name="precio_alquiler" placeholder="Precio Alquiler" maxlength="5" required=""/></td>
                    </tr>
                    <tr>
                        <th>Metros Cuadrados:</th>
                        <td><input type="text" name="m2" placeholder="Metros Cuadrados" maxlength="5" required=""/></td>
                    </tr>
                    <tr>
                        <th>Baños:</th>
                        <td><input type="text" name="banios" placeholder="Baños" maxlength="2" required=""/></td>
                    </tr>
                    <tr>
                        <th>Habitaciones:</th>
                        <td><input type="text" name="habitaciones" placeholder="Habitaciones" maxlength="2" required=""/></td>
                    </tr>
                    <tr>
                        <th>Terraza:</th>
                        <td>
                            <select name="terraza">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Garaje:</th>
                        <td>
                            <select name="garaje">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Trastero:</th>
                        <td>
                            <select name="trastero">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Piscina:</th>
                        <td>
                            <select name="piscina">
                                <option selected="selected"></option>
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td><input type="text" name="direccion" placeholder="Dirección" maxlength="50" required=""/></td>
                    </tr>
                </table>
                <input type="button" value="Enviar Petición" onclick="validarPeticiones()" />
            </form>
        </div>