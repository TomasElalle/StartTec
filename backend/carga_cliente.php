<?php
	require('conexion.php');

	$dni = $_POST["dni"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];

	if (isset($dni)) {
	$sql = "INSERT INTO `clientes` (`dni`, `nombre`, `apellido`, `email`) VALUES ('$dni', '$nombre', '$apellido', '$email')";
	mysqli_query($conexion,$sql);
	header("Location:http://localhost/Function Box/starttec/clientes.php");
	}
?>