<?php
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
		$datos="SELECT * FROM usuarios where NomUsuario='$user'";
		if(!($resultado = mysqli_query($link, $datos))) {
			echo "<p>Error al ejecutar la sentencia <b>$datos</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		$res = mysqli_fetch_assoc($resultado);
		$nombre2=$res['NomUsuario'];
		$email2 = $res['Email'];
		$fnac=explode("/",$fnac);
		$f=date_create($fnac[2].'-'.$fnac[1].'-'.$fnac[0]);
		$fnac=date_format($f,'Y-m-d');
		
		$pais2=$res['Pais'];
		$sexo2=$res['Sexo'];
		$ciudad2=$res['Ciudad'];
		
		if(file_exists($_FILES['fotoperfil']['tmp_name']))
		{
			$target_dir = "../images/";
			$target_file = $target_dir . basename($_FILES["fotoperfil"]["name"]); //ruta con el nombre preparado para subirse
			$num=rand(0,1000);
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'../images/'.$num.$_FILES['fotoperfil']['name']); //AQUI HAY QUE CONTROLAR LAS COLISIONES CON OTRAS FOTOS, QUIZA AÑADIENDO
			//UN NUMERO O LA HORA AL FINAL DEL NOMBRE DE LA IMAGEN, PERO TIENES QUE MODIFICAR LA BD PARA QUE PERMITA QUE LA RUTA SEA MAS LARGA
			$foto= '../images/'.$num.$_FILES['fotoperfil']['name'];
			$ok=true;
			$hayFoto=true;
		}
		else
		{
			$hayFoto=false;
		}
		
		if(strcmp($nombre,$nombre2)==0)
		{
			$nombre=$nombre2;
		}
				
		if(strcmp($email,$email2)==0)
		{
			$email=$email2;
		}
		
		if($genero==$sexo2)
		{
			$genero=$sexo2;
		}
		
		if($ciudad==$ciudad2)
		{
			$ciudad=$ciudad2;
		}
		$nompais="SELECT `IdPais` FROM `paises` where NomPais='$pais'";
		if(!($elpais = mysqli_query($link, $nompais))) {
			echo "<p>Error al ejecutar la sentencia <b>$nompais</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		$datpais = mysqli_fetch_assoc($elpais);
		$nompais=$datpais['IdPais'];
		
		if($nompais==$pais2)
		{
			$nompais=$pais2;
		}
		if($hayFoto==true)
		{
			$sentencia = "UPDATE `usuarios` SET `NomUsuario`='$nombre',`Email`='$email',`Sexo`=$genero,`Fnacimiento`='$fnac',`Ciudad`='$ciudad',`Pais`=$nompais,`Foto`='$foto' WHERE `NomUsuario`='$user'";
		}
		else
		{
			$sentencia = "UPDATE `usuarios` SET `NomUsuario`='$nombre',`Email`='$email',`Sexo`=$genero,`Fnacimiento`='$fnac',`Ciudad`='$ciudad',`Pais`=$nompais,`Foto`='' WHERE `NomUsuario`='$user'";
		}
		
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		
		$_SESSION['sesion']=$nombre;
	mysqli_close($link);
?>