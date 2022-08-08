<!DOCTYPE html>
<html>

<?php
require('backend/conexion.php');

$sql = "SELECT dni FROM clientes";
$result = mysqli_query($conexion,$sql);

?>
<select name="dni" form="union">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['dni'] . "'>'" . $row['dni'] . "'</option>";
    }
    ?>
</select>
</html>