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
	$user=$_SESSION['sesion'];
	$sentencia = "SELECT titulo FROM albumes,usuarios where albumes.usuario = idusuario and NomUsuario='$user'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
}
	echo'<p>Album</p>';
	echo '<select name="album">';
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo'<option>'.$fila['titulo'].'</option>';
	}
	echo '</select>';
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>