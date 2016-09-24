<?php	
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php $titulo="Stardust Images - Mis álbumes";
if(isset($_SESSION["sesion"]))
{
	require_once("includes/plantillaloged.inc.php"); 
	?>
	<body onload="set_style_from_cookie()">
		<?php
			include("includes/validacionupdate.inc.php");
			if($ok==true)
			{
				include("includes/updateUser.inc.php");
			?>
				<p>Modificacón completada con éxito. Vuelve a tu <a href="menuusuario.php">perfil</a>.</p>
			<?php				
			}
			else
			{
			?>
				<p>No se han podido modificar tus datos,<a href="cambiardatos.php"> vuelve a intentarlo</a></p>
			<?php
			}
		?>
		
		
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