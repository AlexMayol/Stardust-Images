<?php
	session_start();
	$_SESSION=array();
	setcookie('usuario','', time()-3600);
	setcookie('pass','', time()-3600);
	setcookie('fecha','', time()-3600);
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Logout";
require_once("includes/plantillahead.inc.php"); ?>
<body>

<p id="centrarDestroy">Te has deslogueado. Puedes <a href="index.php">volver al Inicio</a></p>
</body>
<?php require_once("includes/plantillapie.inc.php"); ?>
</html>
<?php 
	session_destroy();
?>