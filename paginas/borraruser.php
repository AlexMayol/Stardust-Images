<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Adios...";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
	<div id="centrar">
		
		<p id="nick">Tu cuenta ha sido eliminada de Stardust Images. ¡Esperamos que te vuelvas a <a href="registro.php">registrar</a> pronto!</p>
		<?php
			include("includes/borrarCuenta.inc.php");
			$_SESSION=array();
			setcookie('usuario','', time()-3600);
			setcookie('pass','', time()-3600);
			setcookie('fecha','', time()-3600);
			session_destroy();
		?>
	</div>
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