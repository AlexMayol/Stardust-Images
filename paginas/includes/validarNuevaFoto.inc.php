<?php
if(!empty($_POST))
{
	$titulo = $_POST['titulo'];
	$desc= $_POST['descrip'];
	$fecha=$_POST['fecha'];
	$pais = $_POST['pais'];
	$hoy = date("Y-m-d H:i:s");
	$ok= true;
	
	if(strlen($titulo)==0)
	{
		echo "<p>Título no válido</p>";
		$ok = false;
	}
	if(strlen($desc)==0)
	{
		echo "<p>Decripción no válida</p>";
		$ok = false;
	}
	if(!preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/',$fecha))
	{
		echo "<p>Fecha no valida</p>";
		$ok = false;
	}
	
}
?>

