<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM ventas WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar datos nuevos</a> | <a href="cerrar_sesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Fecha</td>
			<td>Hora</td>
			<td>Producto</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Total</td>
			<td>ID cajero</td>
			<td>ID Cliente</td>
			<td>No. Factura</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['fecha']."</td>";
			echo "<td>".$res['hora']."</td>";
			echo "<td>".$res['producto']."</td>";
			echo "<td>".$res['precio']."</td>";
			echo "<td>".$res['cantidad']."</td>";
			echo "<td>".$res['total']."</td>";
			echo "<td>".$res['id_cajero']."</td>";
			echo "<td>".$res['id_cliente']."</td>";	
			echo "<td>".$res['no_factura']."</td>";	
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"borrar.php?id=$res[id]\" onClick=\"return confirm('Estas seguro que quieres borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
