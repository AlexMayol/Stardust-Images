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
		<p>¡Ya estás registrado! Vuelve al <a href="index.php">menú principal</a>.</p>
	</body>
<?php
}else{
	require_once("includes/plantillahead.inc.php");
?>
<body onload="set_style_from_cookie()">
	<p id="infoRegistro">Realiza el registro en "P & I - Photos and images" de forma sencilla en un minuto:</p>
	<form action="respuestaRegistro.php" id="registro" class="formulario" onsubmit="return registro()" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Registrate</legend>
			<p><label for="nombre">Nombre</label> <input id="nameReg" type="text" name="nombre" size="30" maxlength="50" placeholder="Tu nick"></p>
			<p><label for="contrasena">Contrasena</label><input id="passReg" type="password" name="Contrasena" size="20" maxlength="50" placeholder="Contraseña que usarás"></p>
			<p><label for="contrasena">Repite la contrasena</label><input id="repeatReg" type="password" name="Repitecontrasena" placeholder="Repite la contraseña"></p>
			<p><label for="email">Email</label><input id="emailReg" type="text" name="email" size="30" maxlength="30" placeholder="email de contacto"></p>
			<p>Genero: <br>
			<input type="radio" name="sex" id="maleGender" value="male">Male<br/>
			<input type="radio" name="sex" id="femaleGender" value="female">Female</p>
			<p><label for="bday">Fecha de nacimiento:</label><input id="fnacReg" type="text" name="bday" placeholder="Ej.:30/05/1967"></p>
			<?php 
				include("includes/selectpais.inc.php");
			?>
			<p><label for="ciudad">Ciudad:</label><input type="text" name="ciudad" size="25" maxlength="25" placeholder="Ej.: Sanbi Sity"></p>
			<p>Foto de perfil: <input name="fotoperfil" type="file"></p>
			<input type="submit" value="Registrar">
		</fieldset>
	</form>
</body>
<?php 
	}
	require_once("includes/plantillapie.inc.php"); ?>
</html>