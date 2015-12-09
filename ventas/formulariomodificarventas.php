<?php
	$conexion = mysqli_connect('localhost','root','','inmobiliaria')
	or die('No se pudo conectar: ' . mysqli_error());

	if (mysqli_connect_errno()) {
		printf("No se pudo conectar: %s/n", mysqli_connect_error());
		exit();
	}	
	
$IDCASA = $_GET["IDCASA"];
$FECHACOMPRA = $_GET["FECHACOMPRA"];
$PRECIOVENTA = $_GET["PRECIOVENTA"];
$DNICOMPRADOR = $_GET["DNICOMPRADOR"];
echo "</BR>";
echo "</BR>";
echo "</BR>";
echo "<html>";
echo "<head>";
echo "<link rel=stylesheet href=\"\style.css\"\ type=\"\text/css\"\>";

echo "<title>Modificacion de ventas</title>";
echo "</head>";
echo "<body>";
echo "<form action='modificarventas.php' method='POST'>";
echo "<p> ID_CASA: <br>";
echo "<input type='text' name='IDCASA' value=$IDCASA size='100' readonly='readonly'>";
echo "<p> FECHACOMPRA: <br>";
echo "<input type='text' name='FECHACOMPRA' value=$FECHACOMPRA size='100'>";
echo "<p> PRECIOVENTA: <br>";
echo "<input type='text' name='PRECIOVENTA' value=$PRECIOVENTA size='100'>";
echo "<p> DNICOMPRADOR: <br>";
echo "<input type='text' name='DNICOMPRADOR' value=$DNICOMPRADOR size='100'>";
echo "</BR>";
echo "<p><input type='submit' name='submit' value='Modificar venta'></p>";
echo "</form>";
echo "<a href='javascript:history.back(1)'><img src='ATRAS.png' alt='ATRAS' WIDTH='100' HEIGHT='100' border='0'></a>";
echo "</body>";
echo "</html>";	
mysqli_close($conexion);
?>