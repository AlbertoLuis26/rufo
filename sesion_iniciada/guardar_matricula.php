<?php 
	session_start();
	include("../conexion/conexion.php");
//si la conexion no exista nos redirige al login
	if (!isset($_SESSION['rol'])) {
			header("location: ../inicio_sesion/index.php");
	}
	//si no esta logueado como estudiante
	elseif ($_SESSION['rol'] !=2) {
		header("location: ../inicio_sesion/index.php");
	}
	$precio_club_padres = 10.50;
	$suma_total_curso = 0.0;
	$total_matricula = 0.0;

	$vcedula = $_GET['id'];
	$vpermiso = $_GET['prm'];

	$id_usuario = $_POST['id_usuario'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cedula = $_POST['cedula'];
	$grado = $_POST['grado'];
	$club = $_POST['club'];
	$letra = $_POST['letra'];
	
	$seleccion = $_POST['check'];
	foreach ($seleccion as $llave => $valor) {
		$sql = mysqli_query($conn,"SELECT * FROM cursos WHERE id_curso = '$valor'");
		$row = mysqli_fetch_assoc($sql);
		$curso = $row['Curso'];
		$precio = $row['Precio'];

		$query = "INSERT INTO curso_matricula(
		id_usuario,
		id_curso,
		Curso,
		precio
		)VALUES(
		'$id_usuario',
		'$valor',
		'$curso',
		'$precio'
	)"; 
	mysqli_query($conn, $query) or die("ERROR AL  GUARDAR LOS DATOS".mysqli_error());
	}
	$query2 = mysqli_query($conn,"SELECT * FROM curso_matricula WHERE id_usuario = '$id_usuario'");
	while($row2 = mysqli_fetch_assoc($query2)){
	$vprecio = $row2['precio'];
	$suma_total_curso = $suma_total_curso + $vprecio;
}
$total_matricula = $suma_total_curso + $precio_club_padres;
	$query3 = "INSERT INTO matricula(
	id_usuario,
	Nombre,
	Apellido,
	Cedula,
	Grado,
	Letra,
	Club,
	Total_matricula
	)VALUES(
	'$id_usuario',
	'$nombre',
	'$apellido',
	'$cedula',
	'$grado',
	'$letra',
	'$club',
	'$total_matricula'

)";
mysqli_query($conn, $query3) or die("ERROR NO SE PUDO GUARDAR LOS DATOS PARA MATRICULA".mysqli_error());

include("estudiante.php");
header("location: estudiante.php?id=$vcedula&prm=$vpermiso");
 echo "<script>
 	alert ('GUARDADO EXITOSAMENTE');
 </script>";

 ?>