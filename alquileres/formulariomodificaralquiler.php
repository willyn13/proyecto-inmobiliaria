<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}
	
$IDCASA = $_GET["IDCASA"];
$FECHAINICIO = $_GET["FECHAINICIO"];
$FECHAFIN = $_GET["FECHAFIN"];
$PRECIOALQUILER = $_GET["PRECIOALQUILER"];
$DNIINQUILINO = $_GET["DNIINQUILINO"];
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<html>";
echo "<title>Modificacion de alquileres</title>";
echo "</head>";
echo "<body>";
echo "<form action='modificaralquiler.php' method='POST'>";
echo "<p> ID_CASA: <br>";
echo "<input type='text' name='IDCASA' value=$IDCASA size='100' readonly='readonly'>";
echo "<p> FECHAINICIO: <br>";
echo "<input type='text' name='FECHAINICIO' value=$FECHAINICIO size='100'>";
echo "<p> FECHAFIN: <br>";
echo "<input type='text' name='FECHAFIN' value=$FECHAFIN size='100'>";
echo "<p> PRECIOALQUILER: <br>";
echo "<input type='text' name='PRECIOALQUILER' value=$PRECIOALQUILER size='100'>";
echo "<p> DNIINQUILINO: <br>";
echo "<input type='text' name='DNIINQUILINO' value=$DNIINQUILINO size='100'>";
echo "</BR>";
echo "<p><input type='submit' name='submit' value='Modificar alquiler'></p>";
echo "</form>";
echo "<a href='javascript:history.back(1)'><img src='ATRAS.png' alt='ATRAS' WIDTH='100' HEIGHT='100' border='0'></a>";
echo "</body>";
echo "</html>";	
mysqli_close($conexion);
?>