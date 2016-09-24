<?php
	session_start();
	
	$user=$_POST["usuario"];
	$pass=$_POST["contrasenya"];
	$recordar=$_POST["recuerdame"];
	
	date_default_timezone_set('Europe/Madrid');
	$fecha=date('d-m-Y \a \l\a\s H:i');
	
	setcookie('error', '', time()-3600);
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
	$link = @mysqli_connect(
		'localhost', // El servidor
		'root', // El usuario
		'', // La contraseña
		'pibd'); // La base de datos
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
		exit;
	}
	 $sentencia = "SELECT * FROM usuarios WHERE NomUsuario='$user' and Clave='$pass' ";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	

	if($fila = mysqli_fetch_assoc($resultado))
	{
		if(isset($_COOKIE['usuario']))
		{
			if($_COOKIE['pass']==$fila['Clave'])
			{
				$_SESSION['sesion']=$_COOKIE['usuario'];	
				setcookie('fecha', $fecha, time()+3600);
				$extra="menuusuario.php";
			}
		}else{
			$_SESSION['sesion']=$fila['NomUsuario'];
			$extra="menuusuario.php";
			if(isset($recordar) && $recordar=='1')
			{
				setcookie('usuario', $user, time()+3600);
				setcookie('pass', $pass, time()+3600);
				setcookie('fecha', $fecha, time()+3600);
			}
		
		}
		header("Location: http://$host$uri/$extra");
		exit;
	}
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
	exit;
?>