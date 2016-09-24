<?php
$tit=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$pais=$_REQUEST['pais'];
$album=$_REQUEST['album'];
$hoy = date("Y-m-d H:i:s");

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
	
	$nompais="SELECT `IdPais` FROM `paises` where NomPais='$pais'";
	if(!($elpais = mysqli_query($link, $nompais))) {
		echo "<p>Error al ejecutar la sentencia <b>$nompais</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$datpais = mysqli_fetch_assoc($elpais);
	$nompais=$datpais['IdPais'];
	if($tit==null || $tit=="" || $tit=='')
	{
		echo "<p>No has especificado el título de la foto</p>";
		$ok=false;
	}
	if(file_exists($_FILES['subirfoto']['tmp_name']))
	{
		$target_dir = "../user_img/";
		$target_file = $target_dir . basename($_FILES["subirfoto"]["name"]); //ruta con el nombre preparado para subirse
		$num=rand(0,1000);
		move_uploaded_file($_FILES['subirfoto']['tmp_name'],'../user_img/'.$num.$_FILES['subirfoto']['name']); //AQUI HAY QUE CONTROLAR LAS COLISIONES CON OTRAS FOTOS, QUIZA AÑADIENDO
		//UN NUMERO O LA HORA AL FINAL DEL NOMBRE DE LA IMAGEN, PERO TIENES QUE MODIFICAR LA BD PARA QUE PERMITA QUE LA RUTA SEA MAS LARGA
		$foto="../user_img/".$num.$_FILES['subirfoto']['name'];
		$ok=true;
	}
	else
	{
		echo "<p>No has seleccionado ninguna foto</p>";
		$ok=false;
	}
	if(!preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/',$fecha))
	{
		echo "<p>Fecha no valida</p>";
		$ok = false;
	}
	if($fecha!=null && $fecha!='')
	{
		$fecha=explode("/",$fecha);
		$f=date_create($fecha[2].'-'.$fecha[1].'-'.$fecha[0]);
		$fecha=date_format($f,'Y-m-d');
	}

	
	$albumm="SELECT `IdAlbum` FROM `albumes` where `Titulo`='$album'";
	if(!($alb = mysqli_query($link, $albumm))) {
		echo "<p>Error al ejecutar la sentencia <b>$nompais</b>: " . mysqli_error($link);
		echo '</p>';
		exit;
	}
	$a = mysqli_fetch_assoc($alb);
	$album2=$a['IdAlbum'];
	if($ok==true){
		$sentencia= "INSERT INTO fotos values(NULL,'$tit','$descripcion','$fecha','$nompais','$album2','$foto','$hoy')";
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
	}
	
	
// Cierra la conexión
	mysqli_close($link);
?>