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
		$datos="SELECT Clave FROM usuarios where NomUsuario='$user'";
		if(!($resultado = mysqli_query($link, $datos))) {
			echo "<p>Error al ejecutar la sentencia <b>$datos</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		$res = mysqli_fetch_assoc($resultado);
		$pass2= $res['Clave'];
		
		
		if(strcmp($pass,$pass2)==0)
		{
			$pass=$pass2;
		}
		
		
		$sentencia = "UPDATE usuarios SET Clave='$pass' where NomUsuario='$user'";
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		
	mysqli_close($link);
?>