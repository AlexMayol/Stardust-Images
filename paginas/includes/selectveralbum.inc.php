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
	$sentencia = "SELECT `fotos`.`Titulo` as Titulo,`fotos`.`Fecha` as Fecha,NomPais,Fichero FROM albumes,fotos,paises where IdAlbum='$id' and fotos.album='$id' and `fotos`.` Pais`=IdPais";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	
	
	
	
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo '<img src="'.$fila['Fichero'].'" alt="Foto subida recientemente"></a>';
		echo'<p>Título: '.$fila['Titulo'].' </p>';
		echo'<p>Fecha: '.$fila['Fecha'].' </p>';
		echo'<p>País: '.$fila['NomPais'].' </p>';
	}
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
	// Cierra la conexión
	mysqli_close($link);
?>