<?php
$id=$_GET['id'];
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
	$sentencia = "select Fichero,fotos.titulo as Titulo,fotos.fecha as Fecha,NomPais,albumes.titulo as Album,NomUsuario from `fotos`, `paises`,`usuarios`, albumes where IdFoto = '$id' and ` Pais` =paises.IdPais and albumes.usuario=usuarios.IdUsuario and fotos.album=IdAlbum ";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
}
	
	if($fila = mysqli_fetch_assoc($resultado))
	{
		echo '<img class="redim" src="'.$fila['Fichero'].'" alt="esto es una prueba de foto">';
		echo'<ul>';
		echo'<li>Título: '.$fila['Titulo'].'</li>';
		echo'<li>Fecha: '. $fila['Fecha'].'</li>';
		echo'<li>País: '.$fila['NomPais'].'</li>';
		echo'<li>Álbum: '.$fila['Album'].' </li>';
		echo'<li>Usuario: '.$fila['NomUsuario'].'</li>';
		echo'</ul>';
	}
	else
	{
		echo 'No existe esta página.';
	}
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>