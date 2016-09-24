<?php

	if(!empty($_POST))
	{
		$pass = $_POST['Contrasena'];
		$passrepe = $_POST['Repitecontrasena'];
		$ok= true;
				
		if(!(strlen($pass)>=6 && strlen($pass)<=15 && preg_match('/^(?!^[0-9]*$)(?!^[a-z]*$)(?!^[A-Z]*$)^([\w]){6,15}$/',$pass)))
		{
			echo "<p>Contraseña no valida</p>";
			$ok = false;
		}
		
		if(strcmp($pass,$passrepe)!=0)
		{
			echo "<p>Las contraseñas no coinciden</p>";
			$ok = false;
		}
	}
?>




