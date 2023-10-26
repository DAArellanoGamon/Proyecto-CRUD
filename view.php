<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Añadir nuevo producto</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Fecha de compra</td>
			<td>Hora de la compra</td>
			<td>Producto</td>
			<td>Precio del producto</td>
			<td>Cantidad </td>
			<td>Total</td>
			<td>ID del cajero</td>
			<td>Id del cliente</td>
			<td>No. de factura</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array( $result)) {		
			echo "<tr>";
			echo "<td>".$res['fecha']."</td>";
			echo "<td>".$res['hora']."</td>";
			echo "<td>".$res['producto']."</td>";	
			echo "<td>".$res['precio']."</td>";	
			echo "<td>".$res['cantidad']."</td>";	
			echo "<td>".$res['total']."</td>";	
			echo "<td>".$res['id_cajero']."</td>";	
			echo "<td>".$res['id_cliente']."</td>";	
			echo "<td>".$res['id_factura']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
