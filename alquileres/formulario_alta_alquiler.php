<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">
<?php 
    require_once('../conexiones/conexion_inmobiliaria.php');

    if (!empty($_POST['boton'])){

    $idcasa = $_POST['IDCASA'];
    //campos del insert

    //INSERT INTO `alquileres` (`idcasa`, `dni_inquilino`, `dni_usuario`, `fecha_inicio`, `fecha_fin`, `precio_final`)
    session_start();
    $dni = $_SESSION["dni"];
    $consulta = "INSERT INTO alquileres(idcasa,dni_inquilino,dni_usuario,fecha_inicio,fecha_fin,precio_final) VALUES (".$_POST["IDCASA"].",'".$_POST["DNIINQUILINO"]."','".$dni."','".$_POST["FECHAINICIO"]."','".$_POST["FECHAFIN"]."',".$_POST["PRECIOFINAL"].",)";

    $resultado_insert = mysqli_query($conexion,$consulta);
    if($resultado_insert === TRUE){
        header("Location: gestion_alquileres.php");
    }else{
        printf("<h2>No se pudo insertar el registro. Por favor revise los datos</h2>");
    }

    }
    
    if (empty($_POST['IDCASA'])){
        $_POST['IDCASA'] = '10';
    }
    $id_padre = $_POST['IDCASA'];
    echo "</div><div class='cls_gestiones'> 
            <h1>Dar De Alta Nuevo Cliente</h1><br>
            <form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
?>
<table>		
    <tr>
        <td><label for="idcasa">Casa</label></td>
        <td>
            <select name="IDCASA" onChange='this.form.submit()' style="width: 200px;">
                <option value="" selected>Seleccione casa</option>
                <?php		
                    $consulta = "SELECT idcasa FROM inmuebles WHERE alquiler = '1'";
                    $resultado = mysqli_query($conexion,$consulta);
                    while ($casa = mysqli_fetch_array($resultado)){
                        if ($id_padre==$casa[0]){
                            echo "<option value=".$casa[0]." selected>".$casa[0]."</option>";
                        }else{
                            echo "<option value=".$casa[0].">".$casa[0]."</option>";
                        }
                    }
                    echo $casa[0];
                ?>
            </select>
        </td>
    </tr>
    <tr>	
        <td><label for="Precio">Precio</label></td>
        <td>
            <?php
                if (!empty($id_padre)){
                    $consulta = "SELECT precio_alquiler FROM inmuebles WHERE idcasa='".$id_padre."'";
                    $resultado  =mysqli_query($conexion,$consulta);
                    if (mysqli_num_rows($resultado) !=0){
                        while ($casa = mysqli_fetch_array($resultado)){
                            echo "<input type =\"text\" name =\"precio_final\" value=".$casa[0].">";
                        }
                    } else {
                        echo "<input type =\"text\" value=''>";
                    }
                }
            ?>
        </td>
    </tr>    
    <tr>
        <th><p> FECHA DE INICIO: </p></th>
        <input type="text" name="FECHAINICIO" value="AAAA/MM/DD" size="100"/>
    </tr>		
    <tr>
        <th> FECHA DE FIN: </p></th>
        <input type="text" name="FECHAFIN" value="AAAA/MM/DD" size="100"/>
    </tr>	
    <tr>
        <th><p> DNI DEL COMPRADOR: </p></th>
        <select name="DNIINQUILINO">
            <option value="" selected>Selecciona Comprador</option>
            <?php                 
                $consulta = "SELECT dni_cliente, nombre, apellidos FROM clientes WHERE dni_cliente NOT IN(select dni_inquilino from alquileres ) AND dni_cliente NOT IN (select dni_comprador from ventas) AND dni_cliente NOT IN(select dni_propietario FROM inmuebles)";
                $resultado = mysqli_query($conexion,$consulta);
                while ($cliente = mysqli_fetch_array($resultado)){
                    echo "<option value=\"".$cliente[0]."\">".$cliente[1].", ".$cliente[2]."</option>";
                }
            ?>
        </select>
    </tr>
</table>
    <a><input type="submit" id="id_modificar" value="Insertar Alquiler" name="insertar"/>
    <a href="gestion_alquileres.php"><input type="button" value="Cancelar"></a>
    <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>