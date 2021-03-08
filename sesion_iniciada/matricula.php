<?php 
	 include("../conexion/conexion.php");
	//session_start();
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

		//buscamos si el estudiante a sido matriculado
		$query3 = mysqli_query($conn,"SELECT * FROM matricula WHERE Cedula = '$cedula' ");
		$row3 = mysqli_num_rows($query3);
		if($row3 > 0){
			header("location: estudiante.php?id=$cedula&prm=$permiso");
		}

		//seleccionamos tabla usuario para mostrar las consulta en los input
		$query = mysqli_query($conn, "SELECT * FROM usuario WHERE Cedula='$cedula' AND id_permiso = '$permiso'");
		$row = mysqli_fetch_assoc($query);

		//tabla cursos
		$query2 = mysqli_query($conn, "SELECT * FROM cursos");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Matricula</title>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="shortcut icon" href="../imagen\logo_rufo.jpg" />
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="../js/jquery.flexslider.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos/matricula.css">
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
  	<section id="matricula">
  		<h1 class="titulo">PROCESO DE MATRICULA</h1>
  		<article class="matricula">
  			<form action="guardar_matricula.php?id=<?php echo $cedula.'&prm='. $permiso; ?>" method="post">
  				<input type="hidden" name="id_usuario" class="input" value="<?php echo $row['id_usuario'] ?>">
  				<div class="nombres">
  					<label>Nombre:</label>
  					<input type="text" name="nombre" class="input" value="<?php echo $row['Nombre'] ?>" readonly="readonly">
  					<label>Apellido:</label>
  					<input type="text" name="apellido" class="input" value="<?php echo $row['Apellido']  ?>" readonly="readonly">
  				</div>
  				<div class="datos">
  					<label>Cedula:</label>
  					<input type="text" name="cedula" class="input" value="<?php echo $row['Cedula'] ?>" readonly="readonly" >
  					<label>Año en que cursa:</label>
  					<input type="text" name="grado" class="input" value="<?php echo $row['Grado'] ?>"readonly="readonly" >
  				</div>
  				<div class="seleccion">
  					<input type="radio"  class="radio" name="club" value="Club de Padres de Familia" required=""><span class="selecc">Club de Padres de Familia*</span>
  					<label>Opcional  Selecciona Cursos:</label>
  					<?php 
  						while($row2 = mysqli_fetch_assoc($query2)){?>
  							<input type="checkbox" class="check" name="check[]" value="<?php echo $row2['id_curso']  ?>"><?php echo  $row2['Curso']; ?>
  						<?php }
  					 ?>
  				</div>
  				<div class="letra">
  				<label>Letra del Grupo</label>
  				<select required name="letra">
  					<option value="A">A</option>
  					<option value="B">B</option>
  					<option value="C">C</option>
  					<option value="D">D</option>
  				</select>
  			</div>
  			<div id="submit">
  				<input type="submit" name="" class="submit" value="GUARDAR | ENVIAR">
  			</div>
  			</form>
  			
  		</article>

  	</section>
  	<footer>
  		<p>&copySHOPTECC | 2021 </p>
  	</footer>
 </body>
 </html>