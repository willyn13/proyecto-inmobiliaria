<link type="text/css" rel="stylesheet" href="http://localhost/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://localhost/proyecto-inmobiliaria/js/navegar.js"></script>
<div class="cls_dialog">
    
<?php 
    require_once('../conexiones/conexion_inmobiliaria.php'); ?>
<?php

if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
        if (PHP_VERSION < 6){
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;    
        
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
            break;
        
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
        }
            return $theValue;
    }
}

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO usuarios (dni_usuario, idzona, nombre, apellidos, cargo, password) "
            . "VALUES (%s, %s, %s, %s, %s, %s)",
    GetSQLValueString($_POST['dni_usuario'], "text"),
    GetSQLValueString($_POST['idzona'], "text"),
    GetSQLValueString($_POST['nombre'], "text"),
    GetSQLValueString($_POST['apellidos'], "text"),
    GetSQLValueString($_POST['cargo'], "text"),
    GetSQLValueString($_POST['password'], "text"));

    mysql_select_db($database_ConexionInmobiliaria, $ConexionInmobiliaria);
    $Result1 = mysql_query($insertSQL, $ConexionInmobiliaria) or die(mysql_error());

    $insertGoTo = "registro_ok.php";
    
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}
?>
</div>
<div class="cls_gestiones"> 
<h1>Dar De Alta Nuevo Usuario</h1><br>
    
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table>
        <tr>
            <td>Dni:</td>
            <td><span id="sprytextfield1">
                <input type="text" name="dni_usuario" value="" size="32" maxlength="9"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
        <tr>
            <td>Zona:</td>
            <td><span id="sprytextfield2">
                <input type="text" name="idzona" value="" size="32" maxlength="3"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td><span id="sprytextfield3">
                <input type="text" name="nombre" value="" size="32" maxlength="15"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
        <tr>
            <td>Apellidos:</td>
            <td><span id="sprytextfield4">
                <input type="text" name="apellidos" value="" size="32" maxlength="30"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
        <tr>
            <td>Cargo:</td>
            <td><span id="sprytextfield5">
                <input type="text" name="cargo" value="" size="32" maxlength="15"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><span id="sprytextfield6">
                <input type="password" name="password" value="" size="32" maxlength="10"/>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>
            </td>
        </tr>
    </table>
    
    <input type="submit" value="Insertar Usuario" />
    <input type="button" value="Cancelar" />
    <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>