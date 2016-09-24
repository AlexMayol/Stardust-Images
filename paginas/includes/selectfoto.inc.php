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
	$sentencia = "SELECT fichero FROM fotos where Fichero='$foto'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
}
	$fila = mysqli_fetch_assoc($resultado);
	
	$aa=$fila['fichero'];
	
	//echo "<img href='a' alt=""></img>";
	?>
	<a href="detallefoto.php"><img class="redim" src="<?php echo $aa ?>"></img></a>
	<?php
		// Libera la memoria ocupada por el resultado
		mysqli_free_result($resultado);
	// Cierra la conexión
		mysqli_close($link);
?>