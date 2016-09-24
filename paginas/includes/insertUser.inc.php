<?php
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
		$fnac=explode("/",$fnac);
		$f=date_create($fnac[2].'-'.$fnac[1].'-'.$fnac[0]);
		$fnac=date_format($f,'Y-m-d');
		if(file_exists($_FILES['fotoperfil']['tmp_name'])) //FILE  EXISTS PUEDE PETAR, OJO
		{
			$target_dir = "../images/";
			$target_file = $target_dir . basename($_FILES["fotoperfil"]["name"]); //ruta con el nombre preparado para subirse
			$num=rand(0,1000);
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'../images/'.$num.$_FILES['fotoperfil']['name']); //AQUI HAY QUE CONTROLAR LAS COLISIONES CON OTRAS FOTOS, QUIZA AÑADIENDO
			//UN NUMERO O LA HORA AL FINAL DEL NOMBRE DE LA IMAGEN, PERO TIENES QUE MODIFICAR LA BD PARA QUE PERMITA QUE LA RUTA SEA MAS LARGA
			$foto='../images/'.$num.$_FILES['fotoperfil']['name'];
		
		}else
		{
			$foto='';
			
		}
		
		$sentencia = "INSERT INTO `usuarios` values(NULL,'$nombre','$pass','$email',$genero,'$fnac','$ciudad','$nompais','$foto','$hoy')";//solo cambia foto
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
	mysqli_close($link);
?>