<?php
$id=$_SESSION['sesion'];
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
	$sentencia = "SELECT * FROM albumes where albumes.usuario=(SELECT IdUsuario from usuarios where NomUsuario='$id')";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo'<p><a href="veralbum.php?id='.$fila['IdAlbum'].'">Álbum: </a></p>';
		echo'<p>Título: '.$fila['Titulo'].' </p>';
		echo'<p>Descripción: '.$fila['Descripcion'].' </p>';
	}
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
	// Cierra la conexión
	mysqli_close($link);
?>