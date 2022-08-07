<?php 

include('conexion.php');

	$id = $_POST['id'];
	
	
	if(isset($id))
	{
		$sql = "DELETE FROM cliente_tel WHERE id = '".$id."'";

		mysqli_query($conexion,$sql);
		

		$error = mysqli_error($conexion);
		echo $error;

		header("Location:http://localhost/Function Box/starttec/unir_cliente_tel.php");
	}
 ?>