<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">    
<?php
session_start();
$dni = $_SESSION["dni"];
echo $dni;
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h2>No Se Pudo Conectar: %s/n</h2>", mysqli_connect_error());
        exit();
    }
    
    if (!empty($_POST['boton'])){
        $idcasa = $_POST['IDCASA'];

        //campos del insert
        $consulta = "INSERT INTO alquileres(idcasa,dni_inquilino,dni_usuario,fecha_inicio,fecha_fin,precio_final) VALUES "
                . "(".$_POST['IDCASA'].",".$_POST['DNIINQUILINO'].",".$dni.",".$_POST['FECHAINICIO'].",".$_POST['FECHAFIN']."',".$_POST['PRECIOFINAL'].")";

        $resultado = mysqli_query($conexion,$consulta) or die(mysql_error($conexion));
        
        if ($resultado === true){
            echo "</br><h2>Alquiler&nbsp;Registrado</h2>";
            echo '<a><input type="button" id="id_alquiler" value="Aceptar"></a>';
        } else {
            echo "</br><h2>Alquiler&nbsp;No&nbsp;Registrado</h2>";
            echo '<a><input type="button" id="id_alquiler" value="Aceptar"></a>';
        }
    }
    
    echo "</div>";
    
//    if (empty($_POST['IDCASA'])){
//        $_POST['IDCASA'] = '10';
//    }
    //$id_padre=$_POST['IDCASA'];
    
    echo '<div class="cls_gestiones">';
    echo '<h1>Dar De Alta Nuevo Alquiler</h1><br>';
    echo "<form  name='form1' id='form1'>";
?>
<table>		
    <tr>
        <th><label for="IDCASA"> Casa: </label></th>
        <td><select name="IDCASA" <!--onChange='this.form.submit()'--> >
                <option value="" selected>Selecciona Inmueble</option>
<?php		
                $consulta = "SELECT idcasa FROM inmuebles";
                $resultado = mysqli_query($conexion,$consulta);

                while ($casa = mysqli_fetch_array($resultado)){
                    if ($id_padre == $casa[0]){
                        echo "<option value=".$casa[0]." selected>".$casa[0]."</option>";
                    }else{
                        echo "<option value=".$casa[0].">".$casa[0]."</option>";
                    }
                }
                echo $casa[0];
?>
        </select></td>
    </tr>
    <tr>
        <th><label for="PRECIOFINAL"> Precio: </label></th>
        <td><input type="text"></td>
<?php
//            if (!empty($id_padre)){
//                $consulta = "SELECT precio_alquiler FROM inmuebles WHERE idcasa='".$id_padre."'";
//                $resultado = mysqli_query($conexion,$consulta);
//                if (mysqli_num_rows($resultado) !=0){
//                    while ($casa=mysqli_fetch_array($resultado)){
//                        echo "<input type =\"text\" name =\"PRECIOFINAL\" value=".$casa[0]." maxlength='4' required>";
//                    }
//                } else {
//                    echo "<input type =\"text\" value='' maxlength='4' required>";
//                }
//            }
?>
        <!--</td>-->
    </tr>
    <tr>
        <th><label for="FECHAINICIO"> Fecha Inicio: </label></th>
        <td><input type="text" name="FECHAINICIO" placeholder="AAAA/MM/DD" maxlength="10" required/></td>
    </tr>
    <tr>
        <th><label for="FECHAFIN"> Fecha Fin: </label></th>
        <td><input type="text" name="FECHAFIN" placeholder="AAAA/MM/DD" maxlength="10" required/></td>
    </tr>
    <tr>
        <th><label for="DNIPROPIETARIO"> DNI Comprador: </label></th>
        <td><select name="DNIPROPIETARIO">
                <option value="" selected>Selecciona Comprador</option>
<?php                 
                $consulta = "SELECT dni_cliente, nombre, apellidos FROM clientes WHERE dni_cliente NOT IN(select dni_inquilino from alquileres) AND dni_cliente NOT IN (select dni_comprador from ventas) AND dni_cliente NOT IN(select dni_propietario from inmuebles)";
                $resultado = mysqli_query($conexion,$consulta);
                while ($cliente=mysqli_fetch_array($resultado)){
                    echo "<option value=\"".$cliente[0]."\">".$cliente[1]." ".$cliente[2]."</option>";
                }
?>
            </select>
        </td>
    </tr>
</table>
<!--<input type="submit" id="boton" value="Insertar Alquiler" name="boton"/>-->
<!--<a href="gestion_alquileres.php"><input type="button" id="id_cancelar" value="Cancelar" name="cancelar" /></a>-->
<input type="button" value="Insertar Alquiler" onclick="ajaxFormulario('alquileres/form_insertar_alquiler.php', '#form1')" />
<input type="button" id="id_alquileres" value="Cancelar" />
<?php   
echo "</form></div>";	