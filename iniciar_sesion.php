<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usua = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($usua == "" || $pass == "") {
		echo "Algun campo de usuario o contraseña esta vacio.";
		echo "<br/>";
		echo "<a href='login.php'>Ir atras</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE usuario='$usua' AND password=md5('$pass')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['usuario'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid usuario or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
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
