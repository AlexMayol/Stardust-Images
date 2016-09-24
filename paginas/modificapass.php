<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Registro";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
		<?php
			include("includes/getDatosUser.inc.php");
		?>
		<div id="centrar"><p id="verDatos">Revisa y cambia tus datos actuales:</p></div>
		<form action="respuestaUpdatepass.php" id="registro" class="formulario" onsubmit="return registro()" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Tus datos:</legend>
					<p><label for="contrasena">Contrasena</label><input id="passReg" type="password" name="Contrasena" size="20" maxlength="50" placeholder="Contraseña que usarás"></p>
					<p><label for="contrasena">Repite la contrasena</label><input id="repeatReg" type="password" name="Repitecontrasena" placeholder="Repite la contraseña"></p>
				<input type="submit" value="Registrar">
			</fieldset>
		</form>
		<div id="centrar">
			<p class="linksRandom"><a href="borrarFotoPerfil.php">Borrar foto de perfil</a></p>
			<p class="linksRandom"><a href="menuusuario.php">Volver a mi perfil.</a></p>
		</div>
	</body>
<?php
}else{
	require_once("includes/plantillahead.inc.php");
?>
<body onload="set_style_from_cookie()">
	<div id="centrar"><p>No estás logueado o registrado. </p></div>
</body>
<?php 
	}
	require_once("includes/plantillapie.inc.php"); ?>
</html>