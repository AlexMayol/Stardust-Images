<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Álbum creado";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
?>
<body onload="set_style_from_cookie()">
	<div id="centrar">
		<?php
			include("includes/validarNuevaFoto.inc.php");
			if($ok==true)
			{
				include("includes/insertnewalbum.inc.php");
				?>
				<p><b>Inserción realizada, el nuevo álbum es:</b></p>
				<p>Título:<?php echo $_POST['titulo']; ?></p>
				<p>Descripción:<?php echo $_POST['descrip']; ?></p>
				<p>Fecha:<?php echo $_POST['fecha'] ; ?></p>
				<p>País:<?php echo $_REQUEST['pais'] ; ?></p>
				<?php
			}
			else
			{
			?>
				<p class="linksRandom"><a href="crearalbum.php">Vuelve a intentarlo</a></p>
			<?php
			}
			?>
	
	</div>
</body>
<?php
}else{
	require_once("includes/plantillahead.inc.php");
?>
	<body onload="set_style_from_cookie()">
		<p>¡Debes estar <a href="registro.php">registrado</a> para poder crear un álbum!
	</body>
<?php
}
?>
<?php require_once("includes/plantillapie.inc.php"); ?>
</html>