<?php
$titulo=$_GET["titulo"];
$f1=$_GET["forigen"];
$f2=$_GET["ffin"];

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
	$f1=explode("/",$f1);
	$f=date_create($f1[2].'-'.$f1[1].'-'.$f1[0]);
	$f1=date_format($f,'Y-m-d');
	
	$f2=explode("/",$f2);
	$f=date_create($f2[2].'-'.$f2[1].'-'.$f2[0]);
	$f2=date_format($f,'Y-m-d');
	
	$sentencia = "SELECT * FROM `fotos`,`paises` where `Titulo`='$titulo' and `Fecha` BETWEEN '$f1' and '$f2' and ` Pais`=`paises`.IdPais";
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
?>