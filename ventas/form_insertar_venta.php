<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf("<h2>No Se Pudo Conectar: %s/n</h2>", mysqli_connect_error());
        exit();
    }
    
    if (!empty($_POST['boton'])){
        $idcasa = $_POST['IDCASA'];
        
        //campos del insert
        session_start();
        $dni = $_SESSION["dni"];
        $consulta = "INSERT INTO ventas(idcasa,dni_comprador,dni_usuario,fecha_compra,precio_final) VALUES "
                . "(".$_POST['IDCASA'].",".$_POST['DNIPROPIETARIO'].",".$dni.",".$_POST['FECHACOMPRA'].",".$_POST["PRECIOVENTA"].")";

        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado === true){
            echo "</br><h2>Venta&nbsp;Registrada</h2>";
            echo '<a href="gestion_ventas.php"><input type="button" id="id_insertar" value="Aceptar"></a>';
        } else {
            echo "</br><h2>Venta&nbsp;No&nbsp;Registrada</h2>";
            echo '<a href="gestion_ventas.php"><input type="button" id="id_insertar" value="Aceptar"></a>';
        }
    }
    
    echo "</div>";
    
    if (empty($_POST['IDCASA'])){
        $_POST['IDCASA'] = '10';
    }
    $id_padre = $_POST['IDCASA'];
    
    echo '<div class="cls_gestiones">';
    echo '<h1>Dar De Alta Nueva Venta</h1><br>';
    echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
?>
<table>		
    <tr>
        <th><label for="IDCASA"> Casa: </label></th>
        <td><select name="IDCASA" onChange='this.form.submit()' >
                <option value="" selected>Selecciona Inmueble</option>
<?php		
                $consulta = "SELECT idcasa FROM inmuebles WHERE venta=1";
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
        <th><label for="PRECIOVENTA"> Precio: </label></th>
        <td>
<?php
            if (!empty($id_padre)){
                $consulta = "SELECT precio_venta FROM inmuebles WHERE idcasa='".$id_padre."'";
                $resultado = mysqli_query($conexion,$consulta);
                if (mysqli_num_rows($resultado) !=0){
                    while ($casa=mysqli_fetch_array($resultado)){
                        echo "<input type =\"text\" name =\"PRECIOVENTA\" value=".$casa[0]." required>";
                    }
                } else {
                    echo "<input type =\"text\" value='' required>";
                }
            }
            //mysqli_free_result($consulta);
?>
        </td>
    </tr>
    <tr>
        <th><label for="FECHACOMPRA"> Fecha Venta: </label></th>
        <td><input type="text" name="FECHACOMPRA" placeholder="AAAA/MM/DD" required/></td>
    </tr>		
    <tr>
        <th><label for="DNIPROPIETARIO"> DNI Comprador: </label></th>
        <td><select name="DNIPROPIETARIO">
                <option value="" selected>Selecciona Comprador</option>
<?php                 
                $consulta = "SELECT dni_cliente, nombre, apellidos FROM clientes WHERE dni_cliente NOT IN(select dni_inquilino from alquileres ) AND dni_cliente NOT IN (select dni_comprador from ventas) AND dni_cliente NOT IN(select dni_propietario from inmuebles)";
                $resultado = mysqli_query($conexion,$consulta);
                while ($cliente=mysqli_fetch_array($resultado)){
                    echo "<option value=\"".$cliente[0]."\">".$cliente[1].", ".$cliente[2]."</option>";
                }
?>
            </select>
        </td>
    </tr>
</table>
<input type="submit" id="boton" value="Insertar Venta" name="boton"/>
<a href="gestion_ventas.php"><input type="button" id="id_cancelar" value="Cancelar" name="cancelar" /></a>
<?php   
echo "</form></div>";