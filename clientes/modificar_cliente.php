<link type="text/css" rel="stylesheet" href="../css/style.css">
<div class="cls_dialog">
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h1>No Se Pudo Conectar: </h1>' . mysqli_error());

    if (mysqli_connect_errno()) {
            printf('<h1>No Se Pudo Conectar: %s/n</h1>', mysqli_connect_error());
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
<table>
    <form id="formModificacion">
        <h1>Modificar Datos</h1>
        <table>
            <tr>
                <th><label for="dni">Dni</label></th>
                <td><input type="text" id="dni_cliente" placeholder="Dni Cliente" name="dni_cliente" value="<?php echo $cliente[0] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="nombre"> Nombre </label></th>
                <td><input type="text" id="nombre" placeholder="Escribe Nombre" name="nombre" value="<?php echo $cliente[1] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="apellidos"> Apellidos: </label></th>
                <td><input type="text" id="apellidos" placeholder="Escribe Apellidos" name="apellidos" value="<?php echo $cliente[2] ?>"/></td>
            </tr>
            <tr>
                <th><label for="telefono"> Telefono: </label></th>
                <td><input type="text" id="telefono" placeholder="Escribe Telefono" name="telefono" value="<?php echo $cliente[3] ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="mail"> Email: </label></th>
                <td><input type="text" id="email" placeholder="Escribe Email" name="email" value="<?php echo $cliente[4] ?>" required/></td>
            </tr>	
        </table>
        <input type="button" id="id_modificar" value="Guardar cambios" name="modificar" onclick="modificarCliente('clientes/actualizar_cliente.php')" />
        <input type="button" value="Cancelar" onclick="ajaxSinFormulario('1','clientes/gestion_clientes.php')">
    </form>
</table>
</div>

<script type="text/javascript">
    function modificarCliente(url){
        dni=$("#dni_cliente").val();
        nombre=$("#nombre").val();
        apellidos=$("#apellidos").val();
        telefono=$("#telefono").val();
        email=$("#email").val();
        $.get(url,{"dni_cliente":dni,"nombre":nombre,"apellidos":apellidos,"telefono":telefono,"email":email},function(respuesta){
            $("#id_content").html(respuesta);
        });
    }
</script>