<!DOCTYPE html>
<html>
<head>
	<title>Buscador</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<div class="container mt-5 w-75 p-2 border rounded">	
	<div class="row row-cols-3">
		<div class="col"><a class="btn btn-primary m-1" href="http://localhost/Function%20Box/starttec/clientes.php">Carga Clientes</a></div>
		
		<div class="col"><div class="d-grid gap-2 d-md-flex justify-content-md-center"><a href="http://localhost/Function%20Box/starttec/telefonos.php" class="btn btn-primary m-1">Carga Telefono</a></div></div>
	<div class="row row-cols-2 mt-2"><br>
		<!--<div class="col w-25"><button type="button" class="btn btn-danger m-1">Carga Stock</button></div>-->
    
    <FORM METHOD=POST ACTION="buscar.php">
    <INPUT TYPE="text" NAME="busqueda" placeholder="Buscar marca o modelo">
    </FORM>

    <div class="col"><a class="btn btn-danger" href="http://localhost/Function%20Box/starttec/index.php">Reiniciar</a></div>
    
		<!--<div class="col w-75"><input class="form-control " type="text" name="buscador" placeholder="Buscador"></div>
	</div>
	<div class="row row-cols-2 mt-2">-->

	</div>
<?php
include('conexion.php');

echo"<table id='myTable' class='table table-dark mt-2 m-1'>
      <thead>
    <tr>
    <th>ID</th>
    <th>Imei</th>
    <th>Modelo</th>
    <th>Marca</th>
    <th>Fecha Carga</th>
    </tr>
    </thead>";

$busqueda = $_POST['busqueda'];
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
    //CUENTA EL NUMERO DE PALABRAS
    $trozos=explode(" ",$busqueda);
    $numero=count($trozos);
    if ($numero==1) {
      //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
      $sql="SELECT * FROM cliente_tel 
      WHERE modelo LIKE  '%$busqueda%' OR marca LIKE  '%$busqueda%' LIMIT 50";
    } elseif ($numero>1) {
      //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
      //busqueda de frases con mas de una palabra y un algoritmo especializado
      $sql="SELECT * MATCH ( modelo, marca )
        AGAINST (  '$busqueda' ) AS Score FROM cliente_tel WHERE
        MATCH ( modelo, marca ) AGAINST (  '$busqueda' ) ORDER  BY Score DESC LIMIT 50";
    }
    $result=mysqli_query($conexion,$sql);
    While($row=mysqli_fetch_object($result))
    {
      //Mostramos los titulos de los articulos o lo que deseemos...
      $id=$row->id;
      $dni=$row->dni;
      $imei=$row->imei;
      $modelo=$row->modelo;
      $marca=$row->marca;
      $fecha_carga=$row->fecha_carga;
      echo "<tbody>
      <tr>
        <td>".$id."</td>
        <td>".$imei."</td>
        <td>".$modelo."</td>
        <td>".$marca."</td>
        <td>".$fecha_carga."</td>
      </tr>
      </tbody>";
    }
  }
/*
//cadena de conexion
require('backend/conexion.php');
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
  //CUENTA EL NUMERO DE PALABRAS
  $trozos=explode(" ",$busqueda);
  $numero=count($trozos);
  if ($numero==1) {
    //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
    $cadbusca="SELECT  REFERENCIA, TITULO FROM ARTICULOS WHERE VISIBLE =1
      AND DESARROLLO LIKE  '%$busqueda%' OR TITULO LIKE  '%$busqueda%' LIMIT 50";
  } elseif ($numero>1) {
    //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
    //busqueda de frases con mas de una palabra y un algoritmo especializado
    $cadbusca="SELECT  REFERENCIA, TITULO, MATCH ( TITULO, DESARROLLO )
      AGAINST (  '$busqueda' ) AS Score FROM ARTICULOS WHERE
      MATCH ( TITULO, DESARROLLO ) AGAINST (  '$busqueda' ) ORDER  BY Score DESC LIMIT 50";
  }
  $result=mysql("teleformacion", $cadbusca);
  While($row=mysql_fetch_object($result))
  {
    //Mostramos los titulos de los articulos o lo que deseemos...
    $referencia=$row->REFERENCIA;
    $titulo=$row->TITULO;
    echo $referencia." - ".$titulo."<br>";
  }
}
*/
?>
</div>
</body>
</html>