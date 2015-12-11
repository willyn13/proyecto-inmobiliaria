<link type="text/css" rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="../js/navegar.js"></script>

<div class="cls_dialog">   
<?php
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    $sql_comercial = "SELECT * FROM usuarios WHERE dni_usuario='".$_GET['dni_usuario']."'";
    
    $resp_sql = mysqli_query($conexion,$sql_comercial);

    $i = 0;
    while($datos = mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i] = $valor;
            $i++;			
            if ($i == 3){
                break;
            }
        }
        $comercial = $datos;
    }	

    $dni_usuario = $comercial[0];

    setcookie('dni_usuario',$dni_usuario);
?>
</div>

<div class="cls_gestiones">
    <h1>Modificar Datos</h1><br>
    <form action="actualizar_usuario.php" method="POST">
        <table>
            <tr>
                <th><label for="dni_usuario"> DNI Usuario:</label></th>
                <td><input type="text" id="dni_usuario" placeholder="DNI Usuario" name="dni_usuario" maxlength="9" value="<?php echo $comercial[0] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="zona"> Zona: </label></th>
                <td><input type="text" id="zona" placeholder="Escribe zona" name="zona" maxlength="3" value="<?php echo $comercial[1] ?>" required/></td>
            </tr>	
            <tr>
                <th><label for="nombre"> Nombre </label></th>
                <td><input type="text" id="nombre" placeholder="Escribe nombre" name="nombre" maxlength="15" value="<?php echo $comercial[2] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="apellidos"> Apellidos: </label></th>
                <td><input type="text" id="apellidos" placeholder="Escribe apellidos" name="apellidos" maxlength="30" value="<?php echo $comercial[3] ?>" required/></td>
            </tr>
            <tr>
                <th><label for="cargo"> Cargo: </label></th>
                <td><input type="text" id="cargo" placeholder="Escribe cargo" name="cargo" maxlength="15" value="<?php echo $comercial[4] ?>" required/></td>
            </tr>		
            <tr>
                <th><label for="password"> Password: </label></th>
                <td><input type="text" id="password" placeholder="Escribe password" name="password" maxlength="10" value="<?php echo $comercial[5] ?>" required/></td>
            </tr>	
        </table>
        
        <input type="submit" id="id_modificar" value="Guardar Usuario" name="modificar" />
        <a href="gestion_usuarios.php"><input type="button" id="id_cancelar" value="Cancelar" name="cancelar" /></a>
        <input type="hidden" name="MM_insert" value="form1"/>
    </form>
</div>