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
		<form action="respuestaUpdate.php" id="registro" class="formulario" onsubmit="return registro()" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Tus datos:</legend>
				<p><label for="nombre">Nombre</label> <input value="<?php  echo $nombre ?>" id="nameReg" type="text" name="nombre" size="30" maxlength="50" placeholder="Tu nick"></p>
				<p><label for="email">Email</label><input value="<?php  echo $email ?>" id="emailReg" type="text" name="email" size="30" maxlength="30" placeholder="email de contacto"></p>
				<p>Genero: <br>
				<?php
					if($sexo==0){
					?>
						<input type="radio" name="sex" id="maleGender" value="male" checked>Male<br/>
						<input type="radio" name="sex" id="femaleGender" value="female">Female</p>
					<?php
					}else{
						?>
						<input type="radio" name="sex" id="maleGender" value="male">Male<br/>
						<input type="radio" name="sex" id="femaleGender" value="female" checked>Female</p>
						<?php
					}
				?>
				<p><label for="bday">Fecha de nacimiento:</label><input value="<?php  echo date_format($fecha, 'd/m/Y') ?>"id="fnacReg" type="text" name="bday" placeholder="Ej.:30/05/1967"></p>
				<?php 
					include("includes/selectpais.inc.php");
				?>
				<p><label for="ciudad">Ciudad:</label><input value="<?php  echo $ciudad ?>" type="text" name="ciudad" size="25" maxlength="25" placeholder="Ej.: Sanbi Sity"></p>
				<p>Foto de perfil: <input name="fotoperfil" type="file"></p>
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
	<p>No estás logueado o registrado. </p>
</body>
<?php 
	}
	require_once("includes/plantillapie.inc.php"); ?>
</html>