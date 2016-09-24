<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Alex y Ricky" />
	<meta name="keywords" content="HTML5, web, SI, fotos, ua" />
	<meta name="description" content="Página de inicio" />
	<title><?php echo $titulo;?></title>
	<link rel="stylesheet" type="text/css" href="../estilos/index.css" media="screen" title="estilo principal" />
	<link rel="stylesheet" type="text/css" href="../estilos/print.css" media="print"/>
	<link rel="alternate stylesheet" type="text/css" href="../estilos/acces.css" media="screen" title="estilo accesible"/>
	<link rel="alternate stylesheet" type="text/css" href="../estilos/alter.css" media="screen" title="estilo alternativo" />
	<!--<script src="../logica/logRegister.js"></script>-->
	<script src="../logica/ordenarResultados.js"></script>
	<script src="../logica/cookies.js"></script>
	<script src="../logica/checkFecha.js"></script>
	
	<header class="banner">
		<h1><a href="index.php"><img id="banner" src="../web_img/banner.png" alt="Logotipo de SI"></a></h1>
		<div id="centrar"><ul class="menu">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="formulariobusqueda.php">Buscar</a></li>
			<li><a href="menuusuario.php">Perfil</a></li>
			<li><a href="anadirfotoalbum.php">Sube foto</a></li>
			<li><a href="destroy.php">Salir</a></li>
		</ul></div>
		
		<!--este php es para controlar si las cookies estan creadas o no, es decir si se recuerda el usuario añade lo que hay en datoslogin.php -->
		<?php
			if(isset($_COOKIE['usuario']) && isset($_COOKIE['fecha']) && isset($_COOKIE['pass'])){
				include("datoslogin.php");
			}
		?>
	</header>
	<hr>
	
</head>