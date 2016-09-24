<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Mis álbumes";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
	<p>Estos son los álumes que has creado: </p>
	<?php
		include("includes/selectmisalbumes.inc.php");
	?>
	<p class="linksRandom"><a href="menuusuario.php">Volver a mi perfil.</a></p>
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