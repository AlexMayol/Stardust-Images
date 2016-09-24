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
		<p id="nick">Estás a punto de borrar tu cuenta de Stardust Images, ¿estás seguro de quieres continuar?</p>
		<p><a href="menuusuario.php">No, devuélveme a mi menú</a><p/>
		<p><a href="borraruser.php">Sí, bórrame de esta página</a></p>
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