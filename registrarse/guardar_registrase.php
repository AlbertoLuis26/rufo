<?php  
include("../conexion/conexion.php");
 $verificar_cedula = mysqli_query($conn,"SELECT * FROM usuario");
 $row = mysqli_fetch_assoc($verificar_cedula);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$permiso = $_POST['permiso'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$con_contrasena = $_POST['con_contrasena'];
$grado = $_POST['grado'];
 //verificamos si las contraseñas son iguales
if ($contrasena !== $con_contrasena) {
	?>
	<?php  include("registro.php");?>

<h1 class="error">Contraseñas no coinciden</h1>
<?php
}
else{
	$query = "INSERT INTO usuario(
	Nombre,
	Apellido,
	Cedula,
	Contrasena,
	id_permiso,
	Grado,
	Telefono
) VALUES(
	'$nombre',
	'$apellido',
	'$cedula',
	'$contrasena',
	'$permiso',
	'$grado',
	'$telefono'
)";
//confirmaremos si la cedula existe en la base de datos
if ($row['Cedula'] == $cedula) { 
	include ("registro.php"); ?>
	<h1 class="advertencia">El  NÚmero Cedula Ya Existe</h1>
	
<?php  
  }
	else{ 
	mysqli_query($conn,$query)  or die("NO SE PUDO GUARDA LA DATOS EN LA BASE DE DATOS".mysqli_error($conn));
	
include("registro.php"); ?>
<h1 class="exito">Los Datos Se Guardaron Correctamente</h1>
<?php 
	mysqli_close($conn);
	}
} 
?>