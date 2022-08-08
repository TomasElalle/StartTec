<!DOCTYPE html>
<html>
<head>
	<title>StarTec</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="jquery.tablesort.js"></script>
</head>
<body>
<div class="container mt-5 w-75 p-2 border rounded">	
	<div class="row row-cols-3">
		<div class="col"><a class="btn btn-primary m-1" href="./clientes.php">Carga Clientes</a></div>
		
		<div class="col"><div class="d-grid gap-2 d-md-flex justify-content-md-center"><a href="./telefonos.php" class="btn btn-primary m-1">Carga Telefono</a></div></div>
	<div class="row row-cols-2 mt-2"><br>
		<!--<div class="col w-25"><button type="button" class="btn btn-danger m-1">Carga Stock</button></div>-->
		<div class="col w-75"><input class="form-control " type="text" name="buscador" placeholder="Buscador"></div>
	</div>
	<div class="row row-cols-2 mt-2">

	</div>
  <?php
  require('backend/conexion.php');
  $query = "SELECT * FROM `cliente_tel` ORDER BY fecha_carga desc;";
  $result = mysqli_query($conexion,$query);
  $Fecha_actual = date('d-m-y');
  //echo"$Fecha_actual";

  $num = mysqli_num_rows($result);

  echo '<table id="myTable" class="table table-dark mt-2 m-1 tablesorter">';
  echo "<thead>
  <tr>
    <th>ID</th>
    <th>Imei</th>
    <th>Modelo</th>
    <th>Marca</th>
    <th>Fecha Carga</th>
  </tr>
</thead>";

  if($num) {
    while( $row = mysqli_fetch_array($result) ) {
    echo"<tbody>
      <tr>
        <td>".$row[0]."</td>
        <td>".$row[1]."</td>
        <td>".$row[3]."</td>
        <td>".$row[4]."</td>
        <td>".$row[5]."</td>
      </tr>
      </tbody>"; } }
  else {
    echo"Nada seleccionado"; // no rows fetched, so display proper message in a row
  }

echo "</table>";
?>

  <script>
  $(function() {
  $("#myTable").tablesorter();
  });
  </script>
</div>
</body>
</html>