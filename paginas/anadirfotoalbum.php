<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Añade una foto";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
	<form action="anadirfotoconfirmar.php"id="registro" class="formulario" onsubmit="" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Añade una foto</legend>
			<p><label for="titulo">Título: </label><input id="titFoto" type="text" name="titulo" size="30" maxlength="50" placeholder="Título de la foto"></p>
			<p><label for="fecha">Fecha:</label><input id="fechaFoto" type="text" name="fecha" placeholder="Ej.:30/05/1967"></p>
			<p><label for="descripcion">Descripción:</label><input id="descr" type="text" name="descripcion" placeholder="Esta foto esta OP"></p>
			<?php 
				include("includes/selectpais.inc.php");
				include("includes/selectalbum.inc.php");	
			?>
			<p>Foto a añadir: <input name="subirfoto" type="file"></p>
			<input type="submit" value="Añadir">
		</fieldset>
	</form>
	<div id="centrar"><p class="linksRandom"><a href="menuusuario.php">Volver a mi perfil.</a></p></div>
</body>
<?php
}else{
	require_once("includes/plantillahead.inc.php");
?>
<body onload="set_style_from_cookie()">
	<div id="centrar">
		<p>¡Debes estar <a href="registro.php">registrado</a> para subir una foto!</p>
	</div>
</body>
<?php
}
?>

<?php require_once("includes/plantillapie.inc.php"); ?>
</html>