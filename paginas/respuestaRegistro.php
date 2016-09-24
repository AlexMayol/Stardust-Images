<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Inicio";
require_once("includes/plantillahead.inc.php"); ?>

<body>
	<?php
		include("includes/validacion.inc.php");
		if($ok==true)
		{
			include("includes/insertUser.inc.php");
			?>
				<p>Registro completado con éxito. Procede a <a href="index.php">loguearte</a>.</p>
			<?php
		}
		else
		{
			?>
			<p><a href="registro.php">Vuelve a intentar registrarte.</a></p>
			<?php
		}
	?>
</body>

<?php require_once("includes/plantillapie.inc.php"); ?>
</html>