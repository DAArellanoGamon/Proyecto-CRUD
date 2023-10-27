<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id = $_POST['id'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$cantidad = $_POST['cantidad'];
	$total = $_POST['total'];
	$id_cajero = $_POST['id_cajero'];
	$id_cliente= $_POST['id_cliente'];
	$factura= $_POST['factura'];
	
		
	// checking empty fields
	if(empty($fecha) || empty($hora) || empty($producto) || empty($precio) || empty($cantidad) || empty($total) || empty($id_cajero) || empty($id_cliente) || empty($factura)) {
				
		if(empty($fecha)) {
			echo "<font color='red'>Campo de fecha esta vacio.</font><br/>";
		}
		if(empty($hora)) {
			echo "<font color='red'>Campo de hora esta vacio.</font><br/>";
		}
		if(empty($producto)) {
			echo "<font color='red'>Campo de producto esta vacio.</font><br/>";
		}
		if(empty($precio)) {
			echo "<font color='red'>Campo de precio esta vacio.</font><br/>";
		}
		if(empty($cantidad)) {
			echo "<font color='red'>Campo de cantidad esta vacio.</font><br/>";
		}
		if(empty($total)) {
			echo "<font color='red'>Campo de total esta vacio.</font><br/>";
		}
		if(empty($id_cajero)) {
			echo "<font color='red'>Campo de id caero esta vacio.</font><br/>";
		}
		if(empty($id_cliente)) {
			echo "<font color='red'>Campo de id cliente esta vacio.</font><br/>";
		}	
		if(empty($factura)) {
			echo "<font color='red'>Campo de factura esta vacio.</font><br/>";
		}	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE ventas SET fecha='$fecha', hora='$hora', producto='$producto', precio='$precio', cantidad='$cantidad', total='$total', id_cajero='$id_cajero', id_cliente='$id_cliente', no_factura='$factura' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$fecha = $res['fecha'];
	$hora = $res['hora'];
	$producto = $res['producto'];
	$precio = $res['precio'];
	$cantidad = $res['cantidad'];
	$total = $res['total'];
	$id_cajero = $res['id_cajero'];
	$id_cliente = $res['id_cliente'];
	$factura = $res['no_factura'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar_sesion.php">Cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>fecha</td>
				<td><input type="text" name="fecha" value="<?php echo $fecha;?>"></td>
			</tr>
			<tr> 
				<td>hora</td>
				<td><input type="text" name="hora" value="<?php echo $hora;?>"></td>
			</tr>
			<tr> 
				<td>producto</td>
				<td><input type="text" name="producto" value="<?php echo $producto;?>"></td>
			</tr>
			<tr> 
				<td>precio</td>
				<td><input type="number" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
			<tr> 
				<td>cantidad</td>
				<td><input type="number" name="cantidad" value="<?php echo $cantidad;?>"></td>
			</tr>
			<tr> 
				<td>total</td>
				<td><input type="number" name="total" value="<?php echo $total;?>"></td>
			</tr>
			<tr> 
				<td>id cajero</td>
				<td><input type="number" name="id_cajero" value="<?php echo $id_cajero;?>"></td>
			</tr>
			<tr> 
				<td>id cliente</td>
				<td><input type="number" name="id_cliente" value="<?php echo $id_cliente;?>"></td>
			</tr>
			<tr> 
				<td>factura</td>
				<td><input type="number" name="factura" value="<?php echo $factura;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
