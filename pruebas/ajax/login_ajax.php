<?php
function conectarMySql($schema = 'inmobiliaria', $usu = 'root', $pwd = '', $host = 'localhost') {
    try {
        $dsn = "mysql:host=$host;dbname=$schema";
        $db = new PDO ( $dsn, $usu, $pwd );
        return $db;
    } catch ( PDOException $e ) {
        echo "ERROR DE CONEXION BBDD";
        die ();
    }
}
function datosEmpleado() {
    global $bd;
    $bd = conectarMySql();
    $nombre = $_REQUEST['nombre'];
    $password = $_REQUEST['clave'];

        $s = "SELECT cargo FROM usuarios where  dni_usuario = '12345678S' AND password = '1234' ";
        
		$sp = $bd->prepare ( $s );
		$sp->bindParam ( ':NomUsuario', $_GET['nombre'] );
		$sp->bindParam ( ':Clave', $_GET['clave'] );
		$sp->execute ();
		return $sp->fetchAll ();
}


if (($_GET['nombre'] =="") || ($_GET['clave'] =="")){
    echo "Debes introducir algo";
} else {
    $datosEmpleado = datosEmpleado();

    switch ($datosEmpleado){
        case "admin":
            echo "<h1>admin</h1>";
        break;

        case "comercial":
            echo "<h1>comercial</h1>";
        break;

        default: echo "<h1>sigue probando</h1>";
    }     
}
?>