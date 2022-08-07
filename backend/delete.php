<?php 

include('conexion.php');

	$dni = $_POST['dni'];
	
	
	if(isset($dni))
	{
		$sql = "DELETE FROM clientes WHERE dni = '".$dni."'";

		mysqli_query($conexion,$sql);
		

		$error = mysqli_error($conexion);
		echo $error;

		header("Location:http://localhost/Function Box/starttec/clientes.php");
	}
 ?>