<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>

<head>
	<title>Add Data</title>
</head>

<body>
	<?php
	//including the database connection file
	include_once("connection.php");

	if (isset($_POST['Submit'])) {
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$prod = $_POST['prod'];
		$precio = $_POST['precio'];
		$cant = $_POST['cant'];
		$total = $_POST['total'];
		$cliente = $_POST['cliente'];
		$factura = $_POST['factura'];
		$cajero = $_POST['cajero'];
		$loginid = $_SESSION['id'];

		// checking empty fields
		if (empty($fecha) || empty($hora) || empty($prod) || empty($precio) || empty($cant) || empty($total) || empty($cajero) || empty($cliente) || empty($factura)) {

			if (empty($fecha)) {
				echo "<font color='red'>El campo de fecha está vacío.</font><br/>";
			}

			if (empty($hora)) {
				echo "<font color='red'>El campo de hora está vacío.</font><br/>";
			}

			if (empty($prod)) {
				echo "<font color='red'El campo de producto está vacío.</font><br/>";
			}
			if (empty($precio)) {
				echo "<font color='red'>El campo de precio está vacío.</font><br/>";
			}
			if (empty($cant)) {
				echo "<font color='red'>El campo de cantidad está vacío.</font><br/>";
			}
			if (empty($total)) {
				echo "<font color='red'>El campo de total está vacío.</font><br/>";
			}
			if (empty($cajero)) {
				echo "<font color='red'>El campo de cajero está vacío.</font><br/>";
			}
			if (empty($cliente)) {
				echo "<font color='red'>El campo de cliente está vacío.</font><br/>";
			}
			if (empty($factura)) {
				echo "<font color='red'>El campo de factura está vacío.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO products (fecha, hora, producto, precio, cantidad, total, id_cajero, id_cliente, id_factura, login_id) VALUES('$fecha','$hora','$prod', '$precio', '$cant', '$total', '$cajero', '$cliente', '$factura', '$loginid' ");

			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='view.php'>Ver Resultado</a>";
		}
	}
	?>
</body>

</html>