<link type="text/css" rel="stylesheet" href="http://localhost/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">    
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    $sql_cliente = "SELECT * FROM clientes WHERE dni_cliente='".$_GET['dni_cliente']."'";	
    $resp_sql = mysqli_query($conexion,$sql_cliente);

    $i=0;
    while($datos=mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i]=$valor;
            $i++;			
            if ($i==3){break;}
        }
        $cliente=$datos;
    }	
    
    $dni=$cliente[0];

    setcookie('dni',$dni);
?>
</div>

<div class="cls_gestiones">
    <form id="formulario">
        <h1>Modificar Datos</h1>
        <table>
            <tr>
                <th><label for="dni">Dni</label></th>
                <td><input type="text" id="dni_cliente" placeholder="Dni Cliente" name="dni_cliente" maxlength="9" value="<?php echo $cliente[0] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="nombre"> Nombre </label></th>
                <td><input type="text" id="nombre" placeholder="Escribe Nombre" name="nombre" maxlength="15" value="<?php echo $cliente[1] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="apellidos"> Apellidos: </label></th>
                <td><input type="text" id="apellidos" placeholder="Escribe Apellidos" name="apellidos" maxlength="30"value="<?php echo $cliente[2] ?>"/></td>
            </tr>
            <tr>
                <th><label for="telefono"> Telefono: </label></th>
                <td><input type="text" id="telefono" placeholder="Escribe Telefono" name="telefono" maxlength="12" value="<?php echo $cliente[3] ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="mail"> Email: </label></th>
                <td><input type="text" id="email" placeholder="Escribe Email" name="email" maxlength="60" value="<?php echo $cliente[4] ?>" required/></td>
            </tr>
        </table>
        <a><input type="button" id="id_modificar" value="Guardar cambios" name="modificar" onclick="ajaxFormulario('clientes/actualizar_cliente.php', '#formulario')" /></a>
    </form>
</div>