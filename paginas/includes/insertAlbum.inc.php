<?php
$titulo=$_GET["titulo"];
$f1=$_GET["forigen"];
$f2=$_GET["ffin"];
$ok=true;

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
	
	if(!preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/',$f1) || !preg_match('/(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/',$f2))
	{
		echo "<p>Fechas no válidas</p>";
		$ok = false;
	}
	
	if($ok==true)
	{
		$f1=explode("/",$fnac);
		$f=date_create($f1[2].'-'.$f1[1].'-'.$f1[0]);
		$f1=date_format($f,'Y-m-d');
		
		$f2=explode("/",$fnac);
		$f=date_create($f2[2].'-'.$f2[1].'-'.$f2[0]);
		$f2=date_format($f,'Y-m-d');
		
		
		mysqli_set_charset($link,"utf8");
		$sentencia = "SELECT * FROM fotos, paises where titulo='$titulo' and fecha BETWEEN '$f1' and '$f2' and fotos.pais=paises.IdPais";
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		$row_cnt = $resultado->num_rows;
		if($row_cnt>0)
		{
		?>
			<div id="centrar">
				<ul class="menu">
					<li onClick="ordenar(false)">Ascendente</li>
					<li onClick="ordenar(true)">Descendente</li>
				</ul>
			</div>
			
			<div id="centrar">
				<ul id="criteriordenacion">
					<li>
						<select id="criterio">
							<option value="0"> Titulo </option>
							<option value="1"> Fecha </option>
							<option value="2"> Pais </option>
						</select>
					</li>
				</ul>
			</div>
		<?php
		}
		if($row_cnt==0)
		{
			echo 'No hay resultados para la búsqueda';
		}
		else
		{
			echo '<ul>';
			while($fila = mysqli_fetch_assoc($resultado)) {
				echo'<li><a href="detallefoto.php?imagen=1"><img src=" '.$fila['Fichero'].'" alt="foto"></a></li>';
				echo'<li>'.$fila['Titulo'].'</li>';
				echo'<li>'.$fila['Fecha'].'</li>';
				echo'<li>'.$fila['NomPais'].'</li>';
			}
		}
		echo '</select>';
	
		// Libera la memoria ocupada por el resultado
		mysqli_free_result($resultado);
		// Cierra la conexión
		mysqli_close($link);
	}
?>