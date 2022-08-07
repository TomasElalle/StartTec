<!DOCTYPE html>
<html>
<head>
	<title>StarTec</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<div class="container mt-5 w-75 p-2 border rounded">	
	<div class="row row-cols-3">
		<div class="col"><a class="btn btn-primary m-1" href="./clientes.php">Carga Clientes</a></div>
		
		<div class="col"><div class="d-grid gap-2 d-md-flex justify-content-md-center"><a href="./telefonos.php" class="btn btn-primary m-1">Carga Telefono</a></div></div>
		
		<div class="col"><div class="d-grid gap-2 d-md-flex justify-content-md-end"><a href="./unir_cliente_tel.php" class="btn btn-primary m-1">Unir Cliente-Telef</a></div></div>
	</div>
	<div class="row row-cols-2 mt-2">
		<div class="col w-25"><button type="button" class="btn btn-danger m-1">Carga Stock</button></div>
		<div class="col w-75"><input class="form-control " type="text" name="buscador" placeholder="Buscador"></div>
	</div>
	<div class="row row-cols-2 mt-2">
		<div class="col"><button class="btn btn-primary m-1" type="button">ASC-DESC</button></div>
		<div class="col"></div>
	</div>
	<!-- <table class="table table-dark mt-2 m-1">
		<thead>
    <tr>
      <th scope="col">Nombre Cliente</th>
      <th scope="col">Marca-Modelo-Averia</th>
      <th scope="col">Fecha Carga</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-danger">
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr class="table-warning">
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr class="table-info">
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
	</table> -->

  <?php
  require('backend/conexion.php');
  $query = "SELECT * FROM `cliente_tel`";
  $result = mysqli_query($conexion,$query);
  $Fecha_actual = date('d-m-y');
  //echo"$Fecha_actual";
  $query_fecha_cercana = "SELECT * from cliente_tel where
  'fecha_carga' >= $Fecha_actual - 21";
  $fecha_cercana = mysqli_query($conexion,$query_fecha_cercana);

  $query_fecha_proxima = "SELECT * from cliente_tel where
  'fecha_carga' >= $Fecha_actual - 14";
  $fecha_proxima = mysqli_query($conexion,$query_fecha_proxima);

  $query_fecha_lejana = "SELECT * from cliente_tel where
  'fecha_carga' >= $Fecha_actual - 7";
  $fecha_lejana = mysqli_query($conexion,$query_fecha_lejana);

  $num1 = mysqli_num_rows($result);
  $num2 = mysqli_num_rows($result);
  $num3 = mysqli_num_rows($result);

  echo '<table class="table table-dark mt-2 m-1">';
  echo "<thead>
  <tr>
    <th>ID</th>
    <th>Imei</th>
    <th>Fecha Carga</th>
  </tr>
</thead>";

  if($num1) {
    while( $row1 = mysqli_fetch_array($fecha_cercana) ) {
    echo"<tbody>
      <tr>
        <td>".$row1[0]."</td>
        <td>".$row1[1]."</td>
        <td>".$row1[3]."</td>
      </tr>"; } }
      if($num2) {
        while( $row2 = mysqli_fetch_array($fecha_proxima) ) {
        echo"<tbody>
          <tr>
            <td>".$row2[0]."</td>
            <td>".$row2[1]."</td>
            <td>".$row2[3]."</td>
          </tr>"; } }
          if($num3) {
            while( $row3 = mysqli_fetch_array($fecha_lejana) ) {
            echo"<tbody>
              <tr>
                <td>".$row3[0]."</td>
                <td>".$row3[1]."</td>
                <td>".$row3[3]."</td>
              </tr>
              </tbody>";   // all logic for each of the rows comes here
    }
  }
  else {
    echo"Nada seleccionado"; // no rows fetched, so display proper message in a row
  }

echo "</table>";
?>
</div>
</body>
</html>