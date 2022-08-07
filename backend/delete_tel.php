<?php 

include('conexion.php');

	$imei = $_POST['imei'];
	
	
	if(isset($dni))
	{
		$sql = "DELETE FROM telefonos WHERE imei = '".$imei."'";

		mysqli_query($conexion,$sql);
		

		$error = mysqli_error($conexion);
		echo $error;

		header("Location:http://localhost/Function Box/starttec/telefonos.php");
	}
 ?>