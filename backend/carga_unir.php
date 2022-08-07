<?php
	require('conexion.php');

	$imei = $_POST["imei"];
	$dni = $_POST["dni"];
	$fecha_carga = date('Y/m/d', time());
	$carga = $_POST["cargar"];

	if (isset($carga)) {
	$sql = "INSERT INTO `cliente_tel` (`imei`, `dni`, `fecha_carga`) VALUES ('$imei', '$dni', '$fecha_carga')";
	mysqli_query($conexion,$sql);
	header("Location:http://localhost/Function Box/starttec/unir_cliente_tel.php");
	}
?>