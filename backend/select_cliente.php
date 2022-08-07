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

$sql = "SELECT dni FROM clientes";
$result = mysqli_query($conexion,$sql);

?>
<select name="dni" form="union">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['path'] . "'>'" . $row['dni'] . "'</option>";
    }
    ?>
</select>
</body>
</html>