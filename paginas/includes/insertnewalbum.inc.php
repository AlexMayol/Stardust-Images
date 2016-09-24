<?php
$tit=$_POST['titulo'];
$desc=$_POST['descrip'];
$fecha=$_POST['fecha'];
$pais=$_REQUEST['pais'];
$user=$_SESSION['sesion'];

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
	mysqli_set_charset($link,"utf8");
	$idUsu="SELECT `IdUsuario` FROM `usuarios` where NomUsuario='$user'";
	if(!($userID = mysqli_query($link, $idUsu))) {
		echo "<p>Error al ejecutar la sentencia <b>$userID</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$idUsu = mysqli_fetch_assoc($userID);
	$user=$idUsu['IdUsuario'];
	
	$nompais="SELECT `IdPais` FROM `paises` where NomPais='$pais'";
	if(!($elpais = mysqli_query($link, $nompais))) {
		echo "<p>Error al ejecutar la sentencia <b>$nompais</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$datpais = mysqli_fetch_assoc($elpais);
	$nompais=$datpais['IdPais'];
	$fecha=explode("/",$fecha);
	$f=date_create($fecha[2].'-'.$fecha[1].'-'.$fecha[0]);
	$fecha=date_format($f,'Y-m-d');
	
	$sentencia="INSERT into `albumes` VALUES(NULL,'$tit','$desc','$fecha','$nompais','$user')";
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	
	// Libera la memoria ocupada por el resultado
	//mysqli_free_result($resultado);
// Cierra la conexión
	mysqli_close($link);
?>