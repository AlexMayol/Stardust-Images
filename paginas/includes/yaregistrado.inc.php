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
	<script src="../logica/logRegister.js"></script>
	<script src="../logica/ordenarResultados.js"></script>
	<script src="../logica/cookies.js"></script>
	
	<header class="banner">
		<h1><a href="index.php"><img id="banner" src="../web_img/banner.png" alt="Logotipo de SI"></a></h1>
		<div id="centrar"><ul class="menu">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="formulariobusqueda.php">Buscar</a></li>
		</ul></div>
		<form id="login" action="login.php" class="formulario" onsubmit="return log()" method="post">
			<fieldset>
			<legend>Login</legend>
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" />
			<br />
			<label for="contrasenya">Contraseña:</label>
			<input type="text" name="contrasenya" />
			<input type="submit" value="Login" class="centrado" /><br>
			<input type="checkbox" name="recuerdame" value="1"/> Recuérdame
			<br/>
			<a href="registro.php" id="registro1">Registrarse</a>
			</fieldset>
		</form>
	</header>
	<hr>
</head>