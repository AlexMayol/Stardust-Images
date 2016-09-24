<?php

	if(!empty($_POST))
	{
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		
		if(isset($_POST['sex']))
		{
			$genero = $_POST['sex'];
		}
		else
		{
			$genero = null;
		}
		$fnac = $_POST['bday'];
		$pais = $_POST['pais'];
		$ciudad = $_POST['ciudad'];
		$hoy = date("Y-m-d H:i:s");
		$ok= true;
		
		if(file_exists($_FILES['fotoperfil']['tmp_name']))/////lo nuevo
		{
			$existe=$_FILES['fotoperfil']['tmp_name'];
			$imgPerfil=$_FILES['fotoperfil'];
			$path=$_FILES['fotoperfil']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!='jpg' && $ext!='jpeg' && $ext!='png' && $ext!='PNG' && $ext!='JPEG' && $ext!='JPG')
			{
				echo "<p>Tipo de imagen de perfil no valida. Ha de ser png, jpg o jpeg. Usted ha intentado subir un .$ext</p>";
				$ok = false;
			}
		}
		if(!(strlen($nombre)>=3 && strlen($nombre)<=15 && preg_match('/^[A-Za-z0-9]{3,15}$/',$nombre)))
		{
			echo "<p>Nombre no válido</p>";
			$ok = false;
		}
			
		
		if(!preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/',$fnac))
		{
			echo "<p>Fecha no valida</p>";
			$ok = false;
		}
		
		if($genero==null)
		{
			echo "<p>Debes de seleccionar un sexo</p>";
			$ok=false;
		}
		else
		{
			if($genero=="male")
			{
				$genero=0;
			}
			else
			{
				$genero=1;
			}
		}
	}
?>




