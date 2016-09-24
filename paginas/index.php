<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Inicio";
if(isset($_COOKIE["usuario"]))
{
	$_SESSION['sesion']=$_COOKIE["usuario"];
}
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
}else{ 
	require_once("includes/plantillahead.inc.php");
}
?>
<body onload="set_style_from_cookie()">
	<main>
		<p><b>Foto seleccionada</b></p>
		<?php
			include("includes/fotoDestacada.php"); 
			?>
		<p><b>Estas son las últimas fotos subidas:</b></p>
		<?php
			include('includes/selectultimas5.inc.php');
		?>
	</main>
</body>
<?php 
	require_once("includes/plantillapie.inc.php"); 
?>
</html>