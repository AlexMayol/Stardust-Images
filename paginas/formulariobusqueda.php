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
	<form action="resultadobusqueda.php" id="fbusqueda" class="formulario" method="get">
		<fieldset>
			<legend>Datos de la búsqueda</legend>
			<p><label for="titulo" >Título:</label><input type="text" name="titulo" id="fechaInicial" size="20" maxlength="20" placeholder="Ej.:Pollito"></p>
			<p><label>Fecha entre: </label><input type="text" name="forigen" id="fechaFinal" placeholder="Ej.:01/12/1598"> y <input type="text" name="ffin" placeholder="Ej.:04/07/2001"></p>
			<?php
				include("includes/selectpais.inc.php");
			?>

			<p><input type="submit" value="Busca"></p>
		</fieldset>
	</form>
</body>
<?php require_once("includes/plantillapie.inc.php"); ?>
</html>