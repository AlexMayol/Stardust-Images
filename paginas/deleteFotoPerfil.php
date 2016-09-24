<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Borrar foto perfil";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
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
	$nom=$_SESSION['sesion'];
	$sentencia = "SELECT * FROM usuarios where NomUsuario='$nom'";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$fotoperfil = mysqli_fetch_assoc($resultado);
	if($fotoperfil['Foto']==''){
		?>
		<p>No tienes foto de perfil. Vuelve a tu <a href="menuusuario.php">menú para establecerla.</a></p>
		<?php
	}else{
		$user=$_SESSION['sesion'];
		$sentencia = "UPDATE `usuarios` SET `Foto`='' WHERE `NomUsuario`='$user'";
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		unlink($fotoperfil['Foto']);
		?>
		<p>Has borrado tu foto de perfil. Vuelve a tu <a href="menuusuario.php">menú de usuario.</a></p>
		<?php
	}
	
	// Libera la memoria ocupada por el resultado
	
// Cierra la conexión
	mysqli_close($link);
?>	</body>
<?php }else{
	require_once("includes/plantillahead.inc.php");

?>
<body>
<p id="centrarMenuError">No tienes acceso a esta zona porque no estás logueado. También puedes registrarte <a href="registro.php">aquí.</a></p>

</body>
<?php 
	}
	require_once("includes/plantillapie.inc.php");
?>
</html>