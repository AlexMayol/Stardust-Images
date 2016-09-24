<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php $titulo="Stardust Images - Añadir foto";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body>
	<div id="centrar">
		<?php
		include("includes/insertfoto.inc.php"); 
		
		if($ok==true)
		{
		?>
			<p>Inserción realizada correctamente. Datos de la imagen: </p> <!--EN REALIDAD NO COMPROBAMOS SI LA FECHA ES CORRECTA-->
			<p>Título: <?php echo $_POST['titulo']  ?></p>
			<p>Fecha: <?php echo $_POST['fecha']  ?></p>
			<p>Descripción: <?php echo $_POST['descripcion']?></p>
			<p>País: <?php echo $_REQUEST['pais']  ?></p>
			<p>Álbum: <?php echo $_REQUEST['album']  ?></p>
			<p>Foto:<?php include("includes/selectfoto.inc.php"); ?></p>
		<?php
		}else{
			echo "<p><b>No se ha podido insertar la foto</b></p>";
			?>
				<div id="centrar"><p class="linksRandom"><a href="anadirfotoalbum.php">Vuelve a intentarlo.</a></p></div>
				<div id="centrar"><p class="linksRandom"><a href="menuusuario.php">Volver a mi perfil.</a></p></div>
			<?php
		}
		?>
	</div>
</body>
	
<?php
}else{
	require_once("includes/plantillahead.inc.php");
?>
<body>
	<div id="centrar">
		<p>¡Debes estar <a href="registro.php">registrado</a> para crear un álbum!</p>
	</div>
</body>
<?php }
		require_once("includes/plantillapie.inc.php"); ?>
</html>