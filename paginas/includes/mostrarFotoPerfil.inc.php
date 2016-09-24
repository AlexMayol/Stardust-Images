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
	$user=$_SESSION['sesion'];
	mysqli_set_charset($link,"utf8");
	$sentencia = "SELECT Foto FROM usuarios where NomUsuario='$user'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$fotoperfil = mysqli_fetch_assoc($resultado);
	if($fotoperfil['Foto']==''){
		echo "<p>No tienes foto de perfil.</p>";
	}else{
	echo "<p><b>Esta es tu foto de perfil:</b></p>";
	$mostrar=$fotoperfil['Foto'];
	echo "<img src=".$mostrar." class='fotoPerfil' alt='Tu foto de perfil'>";
	}
	// Libera la memoria ocupada por el resultado
	mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>