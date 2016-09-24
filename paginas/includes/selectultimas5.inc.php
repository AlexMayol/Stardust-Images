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
	$sentencia = 'SELECT * FROM `fotos`,`paises` where ` Pais`=paises.idpais ORDER BY FRegistro DESC LIMIT 5';
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	echo '<ul class="ultimasfotos">';
	while($fila = mysqli_fetch_assoc($resultado)) {
		echo '<li>';
				//CAMBIAR echo '<figure><a href="detallefoto.php"><img src="../user_img/img1.jpg" alt="Foto subida recientemente"></a>';
				echo '<figure><a href="detallefoto.php?id='.$fila['IdFoto'].' "><img class="redim" src="'.$fila['Fichero'].'" alt="Foto subida recientemente"></a>';
				echo '<caption>
				<p>Título: '.$fila['Titulo']. '</p><p>Fecha: '.$fila['Fecha'].'</p><p>País: '.$fila['NomPais'].'</p>
				</caption></figure>';
		echo '</li>';
	}
	echo '</ul>';
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>