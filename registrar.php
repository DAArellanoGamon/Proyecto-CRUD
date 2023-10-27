<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$user = $_POST['usuario'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $nombre == "" || $correo == "") {
		echo "Todos los campos deben estar llenos. Uno o varios campos estan vacios.";
		echo "<br/>";
		echo "<a href='registrar.php'>Ir atras</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login ( nombre, correo, usuario, password) VALUES('$nombre', '$correo', '$user', md5('$pass'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro completado";
		echo "<br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Nombre de usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
