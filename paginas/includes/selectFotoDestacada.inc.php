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
	$sentencia = "SELECT * FROM `fotos` where `Titulo`='$titulo' ";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$fila = mysqli_fetch_assoc($resultado);
	echo "<div id='centrar'>";
	echo '<a href="detallefoto.php?id='.$fila['IdFoto'].' "><img src="'.$fila['Fichero'].'" alt="Foto subida recientemente"></a>';
	echo'<p>'.$fila['Titulo'].'</p>';
	echo'<p>'.$fila['Fecha'].'</p>';
	$ay=$fila[' Pais'];
	$sentencia = "SELECT NomPais FROM paises where `IdPais`='$ay'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$fila = mysqli_fetch_assoc($resultado);
	echo'<p>'.$fila['NomPais'].'</p>';
	echo "<b>Crítico:</b> $critico <br />\n";
	echo "<b>Opinión:</b> $opinion <br />\n";
	echo "</div>";
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>