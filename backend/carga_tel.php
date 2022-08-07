<?php
	require('conexion.php');

	$imei = $_POST["imei"];
	$modelo = $_POST["modelo"];
	$marca = $_POST["marca"];
	$fecha_carga = $_POST["fecha_carga"];

	if (isset($imei)) {
	$sql = "INSERT INTO `telefonos` (`imei`, `modelo`, `marca`, `fecha_carga`) VALUES ('$imei', '$modelo', '$marca', '$fecha_carga')";
	mysqli_query($conexion,$sql);
	header("Location:http://localhost/Function Box/starttec/telefonos.php");
	}
?>