<link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

<div class="cls_dialog">
<?php 
    session_start();
    require_once('../conexiones/conexion_inmobiliaria.php');
    
    $conexion = mysqli_connect('localhost','root','','inmobiliaria')
    or die('<h2>No Se Pudo Conectar: </h2>' . mysqli_error());

    if (mysqli_connect_errno()) {
        printf('<h2>No Se Pudo Conectar: %s/n</h2>', mysqli_connect_error());
        exit();
    }

    if (!function_exists("GetSQLValueString")) {
        function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
            if (PHP_VERSION < 6) {
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

    //$editFormAction = $_SERVER['PHP_SELF'];
    if (isset($_SERVER['QUERY_STRING'])) {
      //  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
    }
    
    $dni = $_SESSION["dni"];
    if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
        $insertSQL = sprintf("INSERT INTO ventas(idcasa,dni_comprador,dni_usuario,fecha_compra,precio_final) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IDCASA'], "text"),
                       GetSQLValueString($_POST['dni_cliente'], "text"),
                       GetSQLValueString($dni, "text"),
                       GetSQLValueString($_POST['FECHACOMPRA'], "text"),
                       GetSQLValueString($_POST['precio_final'], "integer"));

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
<h1>Dar De Alta Nueva Venta</h1><br>
<form name="form1" id="form1">
    <table>
        <tr>
            <th><label for="IDCASA"> Casa: </label></th>
            <td>
                <select name="IDCASA" >
                    <option value="" selected>Selecciona Inmueble</option>
<?php       
                    $dni = $_SESSION["dni"];
                    $consulta = "SELECT idcasa FROM inmuebles WHERE alquiler='1' AND idlocalidad = (SELECT idzona FROM usuarios WHERE dni_usuario='".$dni."')";

                    $resultado = mysqli_query($conexion,$consulta);

                    while ($casa = mysqli_fetch_array($resultado)){
                        echo "<option value='".$casa[0]."'>".$casa[0]."</option>";
                    }
?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="dni_cliente"> DNI Comprador: </label></th>
            <td><input type="text" id="dni_cliente" placeholder="Dni Cliente" name="dni_cliente" maxlength="9" value="" required/></td>
        </tr>
        <tr>
            <th><label for="PRECIOVENTA"> Precio: </label></th>
            <td><input type="text" id="precio_final" placeholder="Precio Final" name="precio_final" maxlength="8" required/></td>
        </tr>
        <tr>
            <th><label for="FECHACOMPRA"> Fecha Venta: </label></th>
            <td><input type="text" name="FECHACOMPRA" placeholder="AAAA/MM/DD" maxlength="10" required/></td>
        </tr>
    </table>
    
    <input type="button" value="Insertar Venta" onclick="ajaxFormulario('ventas/form_insertar_venta.php', '#form1')" />
    <input type="button" id="id_ventas" value="Cancelar" />
    <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>