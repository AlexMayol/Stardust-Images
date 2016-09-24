<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Inicio";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
		<form id="creaAlbum" action="insertalbum.php"class="formulario" method="post">
			<fieldset>
				<legend>Datos del álbum nuevo:</legend>
				<p><label for="titulo" >Título:</label><input type="text" name="titulo" size="20" maxlength="20" placeholder="Nombre del album"></p>
				<p><label>Descripción </label><input type="text" name="descrip" size="50" maxlength="50" placeholder="breve descripcion"</p>
				<p><label>Fecha:</label><input type="text" name="fecha" size="10" maxlength="10" placeholder="Ej.:02/10/1999"></p>
				<?php
				include("includes/selectpais.inc.php");
				?>
				<p><input type="submit" value="Crear"></p>
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
	<p>¡Debes estar <a href="registro.php">registrado</a> para crear un álbum!</p>
</div>
</body>

<?php
	}
	require_once("includes/plantillapie.inc.php"); ?>
</html>