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

    $sql_cliente = "SELECT * FROM clientes WHERE dni_cliente='".$_GET['dato']."'";	
    $resp_sql = mysqli_query($conexion,$sql_cliente);

    $i = 0;
    while($datos = mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){break;}
        }
        $cliente = $datos;
    }	
    
    $dni = $cliente[0];

    setcookie('dni',$dni);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos Cliente</h1><br>
    <form id="formulario">
        <table>
            <tr>
                <th><label for="dni_cliente"> DNI Cliente: </label></th>
                <td><input type="text" id="dni_cliente" placeholder="Dni Cliente" name="dni_cliente" maxlength="9" value="<?php echo $cliente[0] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="nombre"> Nombre: </label></th>
                <td><input type="text" id="nombre" placeholder="Nombre" name="nombre" maxlength="15" value="<?php echo $cliente[1] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="apellidos"> Apellidos: </label></th>
                <td><input type="text" id="apellidos" placeholder="Apellidos" name="apellidos" maxlength="30" value="<?php echo $cliente[2] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="telefono"> Telefono: </label></th>
                <td><input type="text" id="telefono" placeholder="Telefono" name="telefono" maxlength="12" value="<?php echo $cliente[3] ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="email"> Email: </label></th>
                <td><input type="text" id="email" placeholder="Email" name="email" maxlength="60" value="<?php echo $cliente[4] ?>" required/></td>
            </tr>
        </table>
        
        <input type="button" value="Guardar Cambios" name="modificar" onclick="ajaxFormulario('clientes/modificar_cliente.php', '#formulario')" />
        <input type="button" id="id_clientes" value="Cancelar" />
    </form>
</div>