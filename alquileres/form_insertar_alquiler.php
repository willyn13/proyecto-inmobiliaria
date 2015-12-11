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
        $consulta = "INSERT INTO alquileres(idcasa,dni_inquilino,dni_usuario,fecha_inicio,fecha_fin,precio_final) VALUES "
                . "(".$_POST['IDCASA'].",".$_POST['DNIINQUILINO'].",".$dni.",".$_POST['FECHAINICIO'].",".$_POST['FECHAFIN']."',".$_POST['PRECIOFINAL'].")";

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
    $id_padre=$_POST['IDCASA'];
    
    echo '<div class="cls_gestiones">';
    echo '<h1>Dar De Alta Nuevo Alquiler</h1><br>';
    echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
?>
<table>		
    <tr>
    <td><label for="idcasa">Casa</label></td>
    <td><font>(*) 
    <select name="IDCASA" onChange='this.form.submit()' style="width: 200px;">
    <option value="" selected>Seleccione casa</option>
    <?php		
    $consulta="SELECT idcasa from inmuebles where alquiler=1";
    $resultado=mysqli_query($conexion,$consulta);
    while ($casa=mysqli_fetch_array($resultado))
    {
    if ($id_padre==$casa[0])
    echo "<option value=".$casa[0]." selected>".$casa[0]."</option>";
    else
    {echo "<option value=".$casa[0].">".$casa[0]."</option>";}
    }
    echo $casa[0];
    ?>

    </select>

    </font></td>
    <tr>	<td><label for="Precio">Precio</label></td>
    <td><font>(*) 

    <?php

    if (!empty($id_padre)){
    $consulta="SELECT precio_alquiler from inmuebles where idcasa='".$id_padre."'";
    $resultado=mysqli_query($conexion,$consulta);
    if (mysqli_num_rows($resultado) !=0){
    while ($casa=mysqli_fetch_array($resultado))
    {
    echo "<input type =\"text\" name =\"PRECIOFINAL\" value=".$casa[0].">";
    }
    }else{
    echo "<input type =\"text\" value=''>";
    }
    }


    //mysqli_free_result($consulta);
    ?>

    </select></td></tr>
    </table>
    <tr>
    <p> FECHA DE INICIO: <br>
    <input type="text" name="FECHAINICIO" value="AAAA/MM/DD" size="100">
    </tr>		
    <tr>
    <p> FECHA DE FIN: <br>
    <input type="text" name="FECHAFIN" value="AAAA/MM/DD" size="100">
    </tr>	
    <tr>
    <p> DNI DEL COMPRADOR: <br>
    <select name="DNIINQUILINO">
    <option value="" selected>Selecciona Comprador</option>
    <?php                 
    $consulta="SELECT dni_cliente, nombre, apellidos from clientes where dni_cliente NOT IN(select dni_inquilino from alquileres ) and dni_cliente NOT IN (select dni_comprador from ventas) and dni_cliente NOT IN(select dni_propietario from inmuebles)";
    $resultado=mysqli_query($conexion,$consulta);
    while ($cliente=mysqli_fetch_array($resultado)){
    echo "<option value=\"".$cliente[0]."\">".$cliente[1].", ".$cliente[2]."</option>";
    }
    ?></select>
    </div>
    <div class="flotados3">
    <table cellpadding="5">
    <tr>
    <td ><br><input type="submit" id="boton" value="Guardar Alquiler" name="boton"/></td>
    </tr>
    </table>
    </div>


    <tr>
    <p> FECHAINICIO: <br>
    <input type="text" name="FECHAINICIO" value="AAAA/MM/DD" size="100">
    </tr>
    <tr>
    <p> FECHAFIN: <br>
    <input type="text" name="FECHAFIN" value="AAAA/MM/DD" size="100">
    </tr>		
    <tr>
    <p> DNIINQUILINO: <br>
    <input type='text' name='DNIINQUILINO'  size="100">
    </tr>
    </form>

</table>
<input type="submit" id="boton" value="Insertar Venta" name="boton"/>
<a href="gestion_ventas.php"><input type="button" id="id_cancelar" value="Cancelar" name="cancelar" /></a>
<?php   
echo "</form></div>";	