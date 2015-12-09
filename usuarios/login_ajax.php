<?php
session_start();
$_SESSION["dni"] = $_POST["dni"];
$dni = $_SESSION["dni"];
$clave = $_POST["clave"];
$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());
	
	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
        
$consulta = "SELECT cargo, password FROM usuarios where dni_usuario = '$dni' ";
$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    if($clave != null && $dni != null){
            while($fila = mysqli_fetch_row($resultado)){
                 $cargo=$fila[0];
                 $password=$fila[1];
            }
            if($cargo == "Comercial" && $password==$clave){
                 include '../menus/menu_comerciales.html';
            }else if($cargo == "admin" && $password==$clave){
                 include '../menus/menu_administradores.html';
            }
    }else{
        ?>
            <script>
                 alert("No se puede conectar, el DNI o la clave es incorrecta");
                 location.href = "http://localhost/proyecto-inmobiliaria/";
            </script>
        <?php   
            }
?>                        