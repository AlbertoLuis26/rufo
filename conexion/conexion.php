<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "rufo";
//$num_items_by_page = 6;
//creando conecion
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
  echo "no se a podido realizar la conexion a la base de datos".mysqli_error($conn);
}
?>
