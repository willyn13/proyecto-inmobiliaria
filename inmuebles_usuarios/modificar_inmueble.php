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

    $sql_inmueble = "SELECT * FROM inmuebles WHERE idcasa='".$_GET['dato']."'";	
    
    $resp_sql = mysqli_query($conexion,$sql_inmueble);

    $i = 0;
    while($datos = mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){break;}
        }
        $inmueble = $datos;
    }	

    $idcasa = $inmueble[0];

    setcookie('dni',$idcasa);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos</h1><br>
    <form id="formulario">
        <table>
            <tr>
                <th><label for="idcasa"> Id Casa: </label></th>
                <td><input type="text" id="idcasa" name="idcasa" placeholder="id Casa" maxlength="3" value="<?php echo $inmueble[0] ?>" readonly/></td>
            </tr>
            <tr>
                <th><label for="venta"> Venta: </label></th>
                <td>
                    <select id="venta" name="venta">
<?php
                        if($inmueble[3]==0){
                            echo "<option value=0 selected>NO</option>";
                            echo "<option value=1 >SI</option>";
                        }
                        else{ 
                            echo "<option value=1 selected>SI</option>";
                            echo "<option value=0 >NO</option>";
                        }
?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="alquiler"> Alquiler: </label></th>
                <td>
                    <select id="alquiler" name="alquiler">
<?php
                        if($inmueble[4]==0){
                            echo "<option value=0 selected>NO</option>";
                            echo "<option value=1 >SI</option>";
                        }
                        else{ 
                            echo "<option value=1 selected>SI</option>";
                            echo "<option value=0 >NO</option>";
                        }
?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="habitaciones"> habitaciones: </label></th>
                <td><input type="text" id="habitaciones" placeholder="Habitaciones" name="habitaciones" maxlength="2" value="<?php echo $inmueble[5] ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="m2"> Metros Cuadrados: </label></th>
                <td><input type="text" id="m2" placeholder="Metros Cuadrados" name="m2" maxlength="4" value="<?php echo $inmueble[6] ?>" required/></td>
            </tr>	
            <tr>
                <th><label for="banios"> Baños: </label></th>
                <td><input type="text" id="banios" placeholder="Baños" name="banios" maxlength="2" value="<?php echo $inmueble[7] ?>" required/></td>
            </tr>	
            <tr>
                <th><label for="terraza"> Terraza:  </label></th>
                <td>
                    <select id="terraza" name="terraza">
<?php
                        if($inmueble[8]==0){
                            echo "<option value=0 selected>NO</option>";
                            echo "<option value=1 >SI</option>";
                        }
                        else{ 
                            echo "<option value=1 selected>SI</option>";
                            echo "<option value=0 >NO</option>";
                        }
?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="trastero"> Trastero:  </label></th>
                <td>
                    <select id="trastero" name="trastero">
<?php
                        if($inmueble[9]==0){
                            echo "<option value=0 selected>NO</option>";
                            echo "<option value=1 >SI</option>";
                        }
                        else{ 
                            echo "<option value=1 selected>SI</option>";
                            echo "<option value=0 >NO</option>";
                        }
?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="piscina"> Piscina:  </label></th>
                <td>
                    <select id="piscina" name="piscina">
<?php
                        if($inmueble[10]==0){
                            echo "<option value=0 selected>NO</option>";
                            echo "<option value=1 >SI</option>";
                        }
                        else{ 
                            echo "<option value=1 selected>SI</option>";
                            echo "<option value=0 >NO</option>";
                        }
?>
                    </select>
                </td>
            </tr>
        <tr>
            <th><label for="garaje"> Garaje:  </label></th>
            <td>
                <select id="garaje" name="garaje">
<?php
                    if($inmueble[11]==0){
                        echo "<option value=0 selected>NO</option>";
                        echo "<option value=1 >SI</option>";
                    }
                    else{ 
                        echo "<option value=1 selected>SI</option>";
                        echo "<option value=0 >NO</option>";
                    }
?>
                    </select>
                </td>
            </tr> 
            <tr>
                <th><label for="direccion"> Dirección: </label></th>
                <td><input type="text" id="direccion" placeholder="Direccion" name="direccion" maxlength="50" value="<?php echo $inmueble[12] ?>" required/></td>
            </tr>	
            <tr>
                <th><label for="idlocalidad"> Localidad: </label></th>
                <td>
                    <select id="idlocalidad" name="idlocalidad">
                        <option selected >Selecciona localidad</option>
<?php          
                            $consulta1="SELECT localidad from localidades where idlocalidad=".$inmueble[1];
                            $resultado1=mysqli_query($conexion,$consulta1);
                            while ($idloc=mysqli_fetch_array($resultado1)){
                                echo"<option value='".$inmueble[1]."' selected>".$idloc[0]."</option>";
                            }
                            $consulta="SELECT idlocalidad,localidad from localidades";
                            $resultado=mysqli_query($conexion,$consulta);
                            while ($idlocalidad=mysqli_fetch_array($resultado)){
                                if($idlocalidad[0]<>$inmueble[1]){
                                    echo "<option value='".$idlocalidad[0]."'>".$idlocalidad[1]."</option>";
                                }
                            }

?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="precio_venta"> Precio Venta: </label></th>
                <td><input type="text" id="precio_venta" placeholder="P.V.P." name="precio_venta" maxlength="8" value="<?php echo $inmueble[13] ?> " required/></td>
            </tr>	
            <tr>
                <th><label for="precio_alquiler"> Precio Alquiler: </label></th>
                <td><input type="text" id="precio_alquiler" placeholder="P.A.P." name="precio_alquiler" maxlength="4" value="<?php echo $inmueble[14] ?> " required/></td>
            </tr>
<!--poner las fotos cuand se pueda
<tr>
<td><label for="imagen1"> imagen1: </label></td>
<td><input type="text" id="imagen1" placeholder="Escribe imagen1" name="imagen1" value="<?php //echo $inmueble[14] ?>" /></td>
</tr>	
<tr>
<td><label for="imagen1"> imagen2: </label></td>
<td><input type="text" id="imagen2" placeholder="Escribe imagen2" name="imagen2" value="<?php //echo $inmueble[15] ?>" /></td>
</tr>	
<tr>
<td><label for="imagen3"> imagen3: </label></td>
<td><input type="text" id="imagen3" placeholder="Escribe imagen3" name="imagen3" value="<?php echo $inmueble[16] ?>" /></td>
</tr>
*/-->
            <tr>
                <th><label for="dnipropietario"> Dni propietario: </label></th>
                <td><input id="dnipropietario" type="text" placeholder="DNI Propietario" name="dni_propietario" maxlength="9" value="<?php echo $inmueble[2] ?>" required/></td>
            </tr>
        </table>
        
        <input type="button" value="Guardar Cambios" name="modificar" onclick="ajaxFormulario('inmuebles_usuarios/actualizar_inmueble.php', '#formulario')" />
        <input type="button" id="id_inmuebles" value="Cancelar" />
    </form>
</div>  