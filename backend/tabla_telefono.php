<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabla Telefono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<?php 

include('conexion.php');

$sql = "SELECT * from telefonos";

$resp_sql = mysqli_query($conexion,$sql);
    
echo '<table class="table table-striped mt-2">
  <thead>
    <tr>
      <th scope="col">IMEI</th>
      <th scope="col">Modelo</th>
      <th scope="col">Marca</th>
      <th scope="col">Fecha Ingreso</th>
    </tr>
  </thead>
  <tbody>';

while ($row = mysqli_fetch_row($resp_sql) ){
  echo "


    <tr>
      <td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
    </tr>
  

  ";
}

echo '</tbody>
</table>';
  

 ?>
</body>
</html>