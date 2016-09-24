<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Inicio";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
}else{
	require_once("includes/plantillahead.inc.php");
}
?>
<body onload="set_style_from_cookie()">
	<main id="imagenesBusqueda">
	<?php
	$ok1=preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][0123456789][0-9][0-9]/',$_GET["ffin"]);
	$ok2=preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][0123456789][0-9][0-9]/',$_GET["forigen"]);
	if(strlen($_GET["titulo"])<=0 || $ok1==false || $ok2==false)
	{
		echo '<div id="centrar"><p>Datos incorrectos, <a href="formulariobusqueda.php">inténtalo de nuevo.</a></p></div>';
	}else
	{
	?>
	<div id="centrar">
		<ul>
			<li><b>Datos de búsqueda:</b></li>
			<li>Título:<?php echo $_GET["titulo"]?></li>
			<li>Fecha de origen:<?php echo $_GET["forigen"]?></li>
			<li>Fecha fin:<?php echo $_GET["ffin"]?></li>
			<!--<li>País:<?php echo $_GET["pais"]?></li>-->
			
		</ul>
		</div>
	
	<section id="resultadobusqueda" class="detalleFoto">
	<?php
		
		include("includes/selectresbusqueda.inc.php");
		}
	?>
	</section>
	
	<div id="centrar">
	</div>
	
	</main>
</body>
<?php require_once("includes/plantillapie.inc.php"); ?>
</html>