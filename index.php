<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a Mi Pagina de ferreteria!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvendio <?php echo $_SESSION['nombre'] ?>! <a href='cerrar_sion.php'>Cerrar sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver y agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Tienes que iniciar sesion para ver esta pagina <br/><br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar sesion</a> | <a href='registrar.php'>Registrarse</a>";
	}
	?>
		<div id="footer">
		<a href="https://daarellanogamon.github.io/cascaraferreteria/web.html">  Creado por: David Alejandro Arellano Gamon</a>
	</div>
</body>
</html>
