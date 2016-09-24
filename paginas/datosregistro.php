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
	<div id="centrar">
		<ul>
			<li>Datos del registro:</li>
			<li>Nombre:<?php echo $_POST["nombre"]?></li>
			<li>Contraseña:<?php echo $_POST["Contrasena"]?></li>
			<li>Email:<?php echo $_POST["email"]?></li>
			<li>Sexo:<?php echo $_POST["sex"]?></li>		
			<li>Fecha de nacimiento:<?php echo $_POST["bday"]?></li>
			<li>País:<?php echo $_POST["pais"]?></li>
			<li>Ciudad:<?php echo $_POST["ciudad"]?></li>
		</ul>
	</div>
</body>
<?php
}else{
	require_once("includes/plantillahead.inc.php");
	?>
	<body onload="set_style_from_cookie()">
	<div id="centrar">
		<p>¡No te has <a href="registro.php">registrado</a>!</p>
	</div>
</body>
<?php
}
?>

<?php require_once("includes/plantillapie.inc.php"); ?>
</html>