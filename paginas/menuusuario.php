<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Menú";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
	<div id="centrar">
		<p id="nick"><b>Tu nombre es:</b></p>

		<p>
		<?php
		if(isset($_SESSION["sesion"])){
			echo $_SESSION["sesion"];
		}
		
		include("includes/mostrarFotoPerfil.inc.php");
		?>
	</p>
	<!--<ul class="menuPerfil">
		<li><a href="cambiardatos.php" id="changedatos">Mis datos</a><br/></li>
		<li><a href="modificapass.php" id="changepass">Modificar contraseña</a><br/></li>
		<li><a href="darbaja.php" id="baja">Darme de baja</a><br/></li>
		<li><a href="misalbumes.php" id="verAlbum">Ver mis albumes</a><br/></li>
		<li><a href="crearalbum.php" id="crearAlbum">Crear un album</a><br/></li>
		<li><a href="anadirfotoalbum.php" id="anadirFoto">Añadir foto a un álbum</a><br/></li>
		<li><a href="destroy.php" id="salir">Salir</a><br/></li>
		</ul>-->
	</div>
	<div id="centrar"><ul class="menuPerfil">
			<li><a href="cambiardatos.php">Mis datos</a></li>
			<li><a href="modificapass.php">Modificar contraseña</a></li>
			<li><a href="darbaja.php">Darme de baja</a></li>
			<li><a href="misalbumes.php">Ver mis álbumes</a></li>
			<li><a href="crearalbum.php">Crear un álbum</a></li>
			<li><a href="anadirfotoalbum.php">Añadir foto a un álbum</a></li>
			<li><a href="destroy.php">Salir</a></li>
		</ul></div>
</body>

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