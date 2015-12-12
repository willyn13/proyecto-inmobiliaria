<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">
<?php 
    require_once('../conexiones/conexion_inmobiliaria.php'); 
    
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
        $insertSQL = sprintf("INSERT INTO usuarios (dni_usuario, idzona, nombre, apellidos, cargo, password) VALUES (%s, %s, %s, %s, %s, %s)",
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
    <form name="form1" id="form1">
        <table>
            <tr>
                <th><label for="dni_usuario"> DNI Usuario: </label></th>
                <td><input type="text" id="dni_usuario" placeholder="DNI Usuario" name="dni_usuario" maxlength="9" value="" required/></td>
            </tr>
            <tr>
                <th><label for="idzona"> Zona: </label></th>
                <td><input type="text" id="idzona" placeholder="Escribe zona" name="idzona" maxlength="3" value="" required/></td>
            </tr>
            <tr>
                <th><label for="nombre"> Nombre: </label></th>
                <td><input type="text" id="nombre" placeholder="Escribe nombre" name="nombre" maxlength="15" value="" required/></td>
            </tr>
            <tr>
                <th><label for="apellidos"> Apellidos: </label></th>
                <td><input type="text" id="apellidos" placeholder="Escribe apellidos" name="apellidos" maxlength="30" value="" required/></td>
            </tr>
            <tr>
                <th><label for="cargo"> Cargo: </label></th>
                <td><input type="text" id="cargo" placeholder="Escribe cargo" name="cargo" maxlength="15" value="" required/></td>
            </tr>		
            <tr>
                <th><label for="password"> Password: </label></th>
                <td><input type="password" id="password" placeholder="Escribe password" name="password" maxlength="10" value="" required/></td>
            </tr>
        </table>
        
        <input type="button" value="Insertar Cliente" onclick="ajaxFormulario('usuarios/form_insertar_usuario.php', '#form1')" />
        <input type="button" id="id_usuarios" value="Cancelar" />
        <input type="hidden" name="MM_insert" value="form1"/>
    </form>
</div>