<form id="login" action="destroy.php" class="formulario" onsubmit="return log()" method="post">
	<fieldset>
		<p>Hola, <?php echo $_COOKIE['usuario']?>, su última visita fue el <?php echo $_COOKIE['fecha']?></p> 
		<input type="submit" value="Salir" class="centrado">
	</fieldset>
</form>