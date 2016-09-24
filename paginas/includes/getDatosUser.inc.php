<?php
$user=$_SESSION['sesion'];

$link = @mysqli_connect(
		'localhost', // El servidor
		'root', // El usuario
		'', // La contraseña
		'pibd'); // La base de datos
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
		exit;
	}
	mysqli_set_charset($link,"utf8");
	
	$datos="SELECT * FROM usuarios where NomUsuario='$user'";
	if(!($resultado = mysqli_query($link, $datos))) {
		echo "<p>Error al ejecutar la sentencia <b>$datos</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$res = mysqli_fetch_assoc($resultado);
	$nombre=$res['NomUsuario'];
	$email=$res['Email'];
	$fecha=new DateTime($res['Fnacimiento']);
	$pais=$res['Pais'];	
	$sexo=$res['Sexo'];
	$ciudad=$res['Ciudad'];
	// Cierra la conexión
	mysqli_close($link);
?>