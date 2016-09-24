<?php
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
	$sentencia = "DELETE FROM usuarios where NomUsuario='$_SESSION[sesion]'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	echo"<p>Cuenta borrada satisfactoriamente</p>";
	// Libera la memoria ocupada por el resultado
	//mysqli_free_result($resultado); FALLA
// Cierra la conexión
	mysqli_close($link);
?>