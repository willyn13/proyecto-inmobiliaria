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

    $sql_comercial = "SELECT * FROM usuarios WHERE dni_usuario='".$_GET['dni_usuario']."'";
    
    $resp_sql = mysqli_query($conexion,$sql_comercial);

    $i=0;
    while($datos=mysqli_fetch_row($resp_sql)){
        foreach($datos as $valor){
            $datos[$i]=$valor;
            $i++;			
            if ($i==3){
                break;
            }
        }
        $comercial=$datos;
    }	

    $dni_usuario=$comercial[0];

    setcookie('dni_usuario',$dni_usuario);
?>
</div>

<div class="cls_gestiones">
<table>
<form action="actualizar_comercial.php" method="POST">
    <h1>Modificar Datos</h1><br>
    <table>
        <tr>
            <td><label for="dni"> dni </label></td>
            <td><input type="text" id="dni_usuario" name="dni" maxlength="9" value="<?php echo $comercial[0] ?>" required/></td>
        </tr>
        <tr>
            <td><label for="zona"> Zona: </label></td>
            <td></font><input type="text" id="zona" placeholder="Escribe zona" name="zona" maxlength="3" value="<?php echo $comercial[1] ?>" /></td>
        </tr>	
        <tr>
            <td><label for="nombre"> Nombre </label></td>
            <td><input type="text" id="nombre" placeholder="Escribe nombre" name="nombre" maxlength="15" value="<?php echo $comercial[2] ?>" required/></td>
        </tr>
        <tr>
            <td><label for="apellidos"> Apellidos: </label></td>
            <td><input type="text" id="apellidos" placeholder="Escribe apellidos" name="apellidos" maxlength="30" value="<?php echo $comercial[3] ?>"/></td>
        </tr>
        <tr>
            <td><label for="cargo"> Cargo: </label></td>
            <td><input type="text" id="cargo" placeholder="Escribe cargo" name="cargo" maxlength="15" value="<?php echo $comercial[4] ?>"/></td>
        </tr>		
        <tr>
            <td><label for="zona"> Password: </label></td>
            <td></font><input type="text" id="password" placeholder="Escribe password" name="zona" maxlength="10" value="<?php echo $comercial[5] ?>" /></td>
        </tr>	
    </table>
    <input type="submit" id="modificar" value="Guardar Cambios" name="modificar"/>
    <input type="button" value="Cancelar"/>
</form>
</table>
</div>