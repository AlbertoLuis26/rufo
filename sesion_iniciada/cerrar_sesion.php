<?php 
include("../conexion/conexin.php");
session_start();
session_destroy();
header("location:../inicio_sesion/index.php");

 ?>