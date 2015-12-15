<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>

<?php
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
            <h1>Dar de alta una petición</h1>
            <form id="form1">
                <table>
                    <tr>
                        <th>Nombre</th>
                        <td><input type="text" name="nombre" /></td>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <td><input type="text" name="dni" /></td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td><input type="text" name="telefono" /></td>
                    </tr>
                    <tr>  
                        <th>Provincia</th>
                        <td>
                            <select name="provincia" id="provincia">
                                <option value="seleccion" selected="selected">Seleccione provincia</option>
                                <?php
                                //$consultaPro = 'SELECT idprovincia,provincia FROM provincias';
                                $consultaPro = 'SELECT provincia FROM provincias';
                                $resultadoPro = mysqli_query($conexion,$consultaPro) or die('Consulta fallida: ' . mysqli_error());
//                                    while ($peticionPro=mysqli_fetch_array($resultadoPro)){
//                                        echo "<option value=".$peticionPro[0].">".$peticionPro[1]."</option>";
//                                        setcookie('id_provincia',$peticionPro[0]);
//                                    }
                                while ($peticionPro=mysqli_fetch_array($resultadoPro)){
                                        echo "<option value=".$peticionPro[0].">".$peticionPro[0]."</option>";
                                        //setcookie('id_provincia',$peticionPro[0]);
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                        <tr id="localidades">
                        <th>Localidad</th>
                        <td>
                            <select name="localidad" id="localidad">
                                
                            </select>
                        </td>
                        </tr>
                    
                    <tr>
                        <th>Venta</th>
                        <td>
                            <select name="venta" id="venta">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="precio_venta">
                        
                    </tr>
                    <tr>
                        <th>Alquiler</th>
                        <td>
                            <select name="alquiler" id="alquiler">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="precio_alquiler">
                        
                    </tr>
                    <tr>
                        <th>Metros cuadrados</th>
                        <td><input type="text" name="m2"/></td>
                    </tr>
                    <tr>
                        <th>Baños</th>
                        <td><input type="text" name="banios"/></td>
                    </tr>
                    <tr>
                        <th>Habitaciones</th>
                        <td><input type="text" name="habitaciones"/></td>
                    </tr>
                    <tr>
                        <th>Terraza</th>
                        <td>
                            <select name="terraza">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Garaje</th>
                        <td>
                            <select name="garaje">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Trastero</th>
                        <td>
                            <select name="trastero">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Piscina</th>
                        <td>
                            <select name="piscina">
                                <option value="S">SI</option>
                                <option value="N" selected="selected">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td><input type="text" name="direccion"/></td>
                    </tr>
                </table>
                <input type="button" value="Insertar Petición" onclick="ajaxFormulario('peticiones/insertarPeticiones.php', '#form1')" />
                <input type="button" id="id_cancelar" value="Cancelar" />
            </form>
        </div>

