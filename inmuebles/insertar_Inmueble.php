<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria') or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}

	echo $_POST["dnipropietario"]."Piscina  ";
	echo $_POST["piscina"]."Piscina";
	echo "localidad ".$_POST["localidad"];
		
$sql = "INSERT INTO inmuebles ( `idlocalidad`, `dni_propietario`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`,
 `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`)
	VALUES ( ".$_POST["localidad"].",'".$_POST["dnipropietario"]."','".$_POST["venta"]."','".$_POST["alquiler"]."',
		'".$_POST["habitaciones"]."','".$_POST["m2"]."','".$_POST["banios"]."',' ".$_POST["terraza"]."', '".$_POST["trastero"]."',
		'".$_POST["piscina"]."','".$_POST["garaje"]."', '".$_POST["direccion"]."',".$_POST["precio_venta"].", 
	 ".$_POST["precio_alquiler"].")";
echo $sql;
	$res = mysqli_query($conexion,$sql);
//Esto trae el ultimo id
	/*
$ultimoId = mysqli_insert_id();
$FormatosPermitidos  = array("image/jpg","image/jpeg","image/gif","image/png");
$limiteKb = 1024; // 1000KB = 1MB
	foreach ($_FILES["imagen"] as $it => $imagen) {
	//esto es un ciclo que se repite segun la cantidad de datos en el formulario
		//primero preguntamos si es el formato correcto, y si tiene el tamaño adecuado
		if(in_array($imagen["type"],$FormatosPermitidos) && $imagen["size"]<$limiteKb * 1024){
			$path = "imagenes/";
			$nombreImagen = md5(uniqid(rand(),true)); //nombre aleatorio alfanumerico
			$PathCompleto = $path.$nombreImagen;
			if(move_uploaded_file($imagen["tmp_name"], $PathCompleto)){
				mysqli_query($conexion,"INSERT INTO imagenes(id_inmueble,imagen) values('".$ultimoId."','".$PathCompleto."')");
			}
		}
	}
        */
	if ($res === TRUE) {
	   	echo "Se ha insertado el inmueble.";
		header ("Location: gestiondeinmuebles.php");
	} else {
		printf("No se pudo insertar el inmueble: 
		%s\n", mysqli_error($conexion));
	}
	

?>