<?php 
	
	include("../conexion/conexion.php");
	session_start();
	$cedula = $_POST['cedula'];
	$contrasena = $_POST['contrasena'];
	$permiso = $_POST['permiso'];
		
		

	$query = mysqli_query($conn, "SELECT *  FROM usuario WHERE  Cedula = '$cedula' AND Contrasena = '$contrasena' AND id_permiso = '$permiso'");

	$row = mysqli_fetch_assoc($query);
	
	if ($row['Cedula'] == $cedula AND $row['Contrasena'] == $contrasena AND $row['id_permiso'] == $permiso) {
		$rol = $row['id_permiso'];
		
		$_SESSION['rol'] = $rol;
		switch ($_SESSION['rol']) {
    	case 1:
    		header("location:../sesion_iniciada/admin/administrador.php?id=$cedula&prm=$permiso");
    		break;
    	case 2:
    		header("location:../sesion_iniciada/estudiante.php?id=$cedula&prm=$permiso");
    		break;
    	default:
	} 
	}
	else{
		include("index.php"); ?>
		<h1 class="error">ERROR DE AUTENTICACION</h1>

	<?php }
 ?>