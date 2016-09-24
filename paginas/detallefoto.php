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
	<section class="detalleFoto">
	<?php
		include("includes/selectdatosfoto.inc.php");
	?>
	</section>
</body>
<?php }else{
	require_once("includes/plantillahead.inc.php");
?>
<body onload="set_style_from_cookie()">
<p id="detalleFotoCentrar">Debes estar registrado para ver las fotos. <a href="registro.php">¡Regístrate ya!</a></p>
</body>
<?php }
	require_once("includes/plantillapie.inc.php"); 
?>
</html>