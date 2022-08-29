<?php 

include('conexion.php');

	$imei = $_POST['imei'];
	
	
	if(isset($imei))
	{
		$sql = "DELETE FROM cliente_tel WHERE imei = '".$imei."'";

		mysqli_query($conexion,$sql);
		

		$error = mysqli_error($conexion);
		echo $error;

		header("Location:http://localhost/Function Box/starttec/telefonos.php");
	}
 ?>