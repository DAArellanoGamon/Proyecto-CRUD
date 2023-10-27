<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$cantidad = $_POST['cantidad'];
	$total = $_POST['total'];
	$id_cajero = $_POST['id_cajero'];
	$id_cliente = $_POST['id_cliente'];
	$factura= $_POST['factura'];
	$loginId= $_SESSION['id'];
		
	// checking empty fields
	if(empty($fecha) || empty($hora) || empty($producto) || empty($precio) || empty($cantidad) || empty($total) || empty($id_cajero) || empty($id_cliente) || empty($factura) ) {
				
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
			echo "<font color='red'>Campo de fecha esta vacio.</font><br/>";
		}
		if(empty($id_cliente)) {
			echo "<font color='red'>Campo de tipo de sangre esta vacio.</font><br/>";
		}
		if(empty($factura)) {
			echo "<font color='red'>Campo de tipo de sangre esta vacio.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Ir atras</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO ventas(fecha, hora, producto, precio, cantidad, total, id_cajero, id_cliente, no_factura, login_id) VALUES('$fecha','$hora','$producto', '$precio','$cantidad','$total','$id_cajero','$id_cliente', '$factura', '$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Mirar Resultados</a>";
	}
}
?>
</body>
</html>
