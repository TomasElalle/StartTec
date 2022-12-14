<!DOCTYPE html>
<html>
<head>
	<title>Telefonos Starttec</title>
	<?php
	require('backend/conexion.php');
	?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
	<div class="m-5 container-sm border w-50 rounded p-2">
		<a href="./index.php" class="btn btn-success m-1">Volver</a>
		<form class="" method="POST" action="backend/carga_tel.php">
		<label class="form-label"><h2>Cargar Telefono</h2></label><br>
		<select name="dni" class="form-control w-25 m-2">
		<?php
		$sql = "SELECT dni FROM clientes";
		$result = mysqli_query($conexion,$sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value='" . $row['dni'] . "'>'" . $row['dni'] . "'</option>";
		}
		?>
		</select>
		<input class="form-control w-25 m-2" type="text" name="imei" placeholder="IMEI">
		<input class="form-control w-25 m-2" type="text" name="modelo" placeholder="Modelo">
		<input class="form-control w-25 m-2" type="text" name="marca" placeholder="Marca">
		<input class="form-control w-25 m-2" type="date" name="fecha_carga" placeholder="Fecha de carga">
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
		<input class="btn btn-success m-2" type="submit" name="cargar" value="Guardar">
		</form>
		</div>
		<form method="POST" action="backend/delete_tel.php">
			<label class="form-label"><h2>Eliminar Telefono</h2></label>
			<input class="form-control m-2 w-25" type="number" name="imei" placeholder="IMEI"><br>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<input class="btn btn-danger mb-2 mt-2 me-4" type="submit" name="borrar" value="Borrar">
			</div>
		</form>
		<?php
		include('backend/tabla_uniones.php')
	?>
	</div>

</body>
</html>