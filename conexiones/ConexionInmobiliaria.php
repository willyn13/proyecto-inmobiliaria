<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConexionInmobiliaria = "localhost";
$database_ConexionInmobiliaria = "inmobiliaria";
$username_ConexionInmobiliaria = "root";
$password_ConexionInmobiliaria = "";
$ConexionInmobiliaria = mysql_pconnect($hostname_ConexionInmobiliaria, $username_ConexionInmobiliaria, $password_ConexionInmobiliaria) or trigger_error(mysql_error(),E_USER_ERROR); 
?>