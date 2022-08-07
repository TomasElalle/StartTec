<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<?php
require('backend/conexion.php');

$sql = "SELECT imei FROM telefonos";
$result = mysqli_query($conexion,$sql);
?>

<select name="imei" form="union">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['path'] . "'>'" . $row['imei'] . "'</option>";
    }
    ?>          
</select>
</body>
</html>