<?php 
include("../conexion/conexion.php");
if (!isset($_SESSION)) {
		session_start();
	}
	$cedula= $_GET['id'];
	$permiso = $_GET['prm'];
    
		//si la conexion no exista nos redirige al login
		if (!isset($_SESSION['rol'])) {
			header("location: ../inicio_sesion/index.php");
		}
		//si no esta logueado como estudiante
		elseif ($_SESSION['rol'] != $_GET['prm']) {
			header("location: ../inicio_sesion/index.php?id=$cedula&prm=$permiso");
		}
		
	
	if (isset($cedula) and isset($permiso)) {
		$query = mysqli_query($conn, "SELECT * FROM usuario WHERE Cedula= '$cedula' AND id_permiso = '$permiso'");

	}
	$query2 = mysqli_query($conn,"SELECT * FROM matricula WHERE Cedula = '$cedula'");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>INICIO</title>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="shortcut icon" href="../imagen\logo_rufo.jpg" />
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="../js/jquery.flexslider.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos/inicio.css">
    <script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
    	touch: true,
    	pauseOnAction: false,
    	pauseOnHover: false,
    });
  });
</script>
 </head>
 <body>
 	<div class="flexslider">
		<ul class="slides">
			<li>
				<!--<img src="../imagen/school.jpg" alt="">-->
				<section class="flex-caption">
					<p>BIENVENIDO</p>
				</section>

			</li>
			<li>
				<!--<img src="../imagen/school2.jpg" alt="" height="">-->
				<section class="flex-caption">
					<p>INSTITUTO RUFO A GARAY</p>
				</section>
			</li>
			<li>
				<!--<img src="../imagen/fondo_registro.jpg" alt="">-->
				<section class="flex-caption">
					<p>MATRICULAS ABIERTAS!</p>
				</section>
			</li>
		</ul>
	</div>
  	<section id="menu">
  		<nav class="nav">
  			<ul class="menu">
  			  <li><a href="cerrar_sesion.php"><i class=" icono fas fa-sign-out-alt">Cerrar Sesion</i></a></li>
  			</ul>
  		</nav>
  	</section>
  	<section id="table">
  		<article class="table">
  			<table>
  				<thead>
  					<tr>
  						<td>Cedula</td>
  						<td>Nombres</td>
  						<td>Apellidos</td>
  						<td>Año</td>
  						<td>Telefono</td>
  						<td>Acción</td>
  						<td>Recibo</td>
  						<td></td>
  					</tr>
  				</thead>
  				<tbody>
  					<tr>
  						<?php 
  							while ($row = mysqli_fetch_assoc($query)){?>
  								<td><?php echo $row['Cedula'] ?></td>
  								<td><?php echo $row['Nombre'] ?></td>
  								<td><?php echo $row['Apellido'] ?></td>
  								<td><?php echo $row['Grado'] ?></td>
  								<td><?php echo $row['Telefono'] ?></td>
  								<td><a href="matricula.php?id=<?php echo $cedula.'&prm='.$permiso; ?>"><i class="matri fas fa-clipboard"></i></a></td>

  								<?php 
  									$row2 = mysqli_num_rows($query2);
  									if ($row2 > 0) { ?>
  										<td><a href="../pdf/factura.php?id=<?php echo $cedula. '&prm='.$permiso?>" target="blank"><i class=" factura fas fa-file-pdf"></i></a></td>
  										<td class="matriculado">Matriculado</td>
  									<?php }
  								 
  								 }
  						 ?>
  					</tr>
  				</tbody>
  			</table>
  		</article>
  	</section>
  	<footer>
  		<p>&copySHOPTECC | 2021 </p>
  	</footer>
 </body>
 </html>