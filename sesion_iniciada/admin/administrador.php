<?php 

include("../../conexion/conexion.php");
//session_start();
if (!isset($_SESSION)) {
		session_start();
	}
	
    
$cedula= $_GET['id'];
$permiso = $_GET['prm'];
    
		//si la conexion no exista nos redirige al login
		if (!isset($_SESSION['rol'])) {
			header("location: ../../inicio_sesion/index.php");
		}
		//si no esta logueado como estudiante
		elseif ($_SESSION['rol'] != $_GET['prm']) {
			header("location: ../../inicio_sesion/index.php?id=$cedula&prm=$permiso");
		}
		/*if (isset($_GET['cerrar_sesion'])) {
       session_unset();
       session_destroy();
  }*/
	$cedula= $_GET['id'];
	$permiso = $_GET['prm'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ADMINISTRADOR</title>
 	<link rel="shortcut icon" href="../../imagen\logo_rufo.jpg" />
 	<!--nav-tabs-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../../js/nav_tabs.js"></script>

 	<link rel="stylesheet" type="text/css" href="estilos/admin.css">
 	<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="../../js/jquery.flexslider.js"></script>
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
					<p>VERSION ADMINISTRADOR</p>
				</section>
			</li>
		</ul>
	</div>
  	<section id="menu">
  		<nav class="nav">
  			<ul class="menu">
  			  <li><a href="../cerrar_sesion.php"><i class=" icono fas fa-sign-out-alt">Cerrar Sesion</i></a></li>
  			</ul>
  		</nav>
  	</section>
  	<section id="wrap">
  	<div class="wrap">
      <ul class="tabs">
        <li><a href="#tab1"><i class="matri fas fa-clipboard"></i><span class="tab-text">Matricula Primer Año</span></a></li>
        <li><a href="#tab2"><i class="matri fas fa-clipboard"></i></span><span class="tab-text">Matricula Segundo Año</span></a></li>
        <li><a href="#tab3"><i class="matri fas fa-clipboard"></i><span class="tab-text">Matricula Tercer Año</span></a></li>
        
      </ul>
      <div class="secciones">
        <article id="tab1">
        	<?php 
        		$letra1 = 'A';
        		$grado1 ='Primer Año';
        		$query1 = mysqli_query($conn,"SELECT COUNT(Grado) AS count FROM matricula WHERE Grado = '$grado1' AND Letra='$letra1'");
        		$row1 = mysqli_fetch_assoc($query1);
        		$count = $row1['count'];

        		$letra2 = 'B';
        		$grado2 ='Primer Año';
        		$query2 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_dos FROM matricula WHERE Grado = '$grado2' AND Letra='$letra2'");
        		$row2 = mysqli_fetch_assoc($query2);
        		$count2 = $row2['count_dos'];

        		$letra3 = 'C';
        		$grado3 ='Primer Año';
        		$query3 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_tres FROM matricula WHERE Grado = '$grado3' AND Letra='$letra3'");
        		$row3 = mysqli_fetch_assoc($query3);
        		$count3 = $row3['count_tres'];

        		$letra4 = 'D';
        		$grado4 ='Primer Año';
        		$query4 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_cuatro FROM matricula WHERE Grado = '$grado4' AND Letra='$letra4'");
        		$row4 = mysqli_fetch_assoc($query4);
        		$count4 = $row4['count_cuatro'];
        	 ?>
          <h1>MATRICULADOS PRIMER AÑO</h1>
          <table>
          	<thead>
          		<tr>
          			<td>Letra</td>
          			<td>Total Matriculados</td>
          			<td>Ver</td>
          		</tr>
          	</thead>
          	<tbody>
          		<tr>
          			<td>Primer Año A</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado1 . '&letra='. $letra1; ?>" target="blank"><i class=" ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Primer Año B</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count2 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado2 . '&letra='. $letra2; ?>" target="blank"><i class=" ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Primer Año C</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count3 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado3 . '&letra='. $letra3; ?>" target="blank"><i class=" ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Primer Año D</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count4 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado4 . '&letra='. $letra4; ?>" target="blank"><i class=" ver fas fa-eye"></i></a></td>
          		</tr>
          	</thead>
          </table>
  		</article>
  		<article id="tab2">
          <h1>MATRICULADOS SEGUNDO AÑO</h1>
          <?php 
        		$letra1 = 'A';
        		$grado1 ='Segundo Año';
        		$query1 = mysqli_query($conn,"SELECT COUNT(Grado) AS count FROM matricula WHERE Grado = '$grado1' AND Letra='$letra1'");
        		$row1 = mysqli_fetch_assoc($query1);
        		$count = $row1['count'];

        		$letra2 = 'B';
        		$grado2 ='Segundo Año';
        		$query2 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_dos FROM matricula WHERE Grado = '$grado2' AND Letra='$letra2'");
        		$row2 = mysqli_fetch_assoc($query2);
        		$count2 = $row2['count_dos'];

        		$letra3 = 'C';
        		$grado3 ='Segundo Año';
        		$query3 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_tres FROM matricula WHERE Grado = '$grado3' AND Letra='$letra3'");
        		$row3 = mysqli_fetch_assoc($query3);
        		$count3 = $row3['count_tres'];

        		$letra4 = 'D';
        		$grado4 ='Segundo Año';
        		$query4 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_cuatro FROM matricula WHERE Grado = '$grado4' AND Letra='$letra4'");
        		$row4 = mysqli_fetch_assoc($query4);
        		$count4 = $row4['count_cuatro'];
        	 ?>
          
          <table>
          	<thead>
          		<tr>
          			<td>Letra</td>
          			<td>Total Matriculados</td>
          			<td>Ver</td>
          		</tr>
          	</thead>
          	<tbody>
          		<tr>
          			<td>Segundo Año A</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado1 . '&letra='. $letra1; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Segundo Año B</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count2 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado2 . '&letra='. $letra2; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Segundo Año C</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count3 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado3 . '&letra='. $letra3; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Segundo Año D</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count4 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado4 . '&letra='. $letra4; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          	</thead>
          </table>
      </article>
      <article id="tab3">
          <h1>MATRICULADOS TERCER AÑO</h1>
          <?php 
        		$letra1 = 'A';
        		$grado1 ='Segundo Año';
        		$query1 = mysqli_query($conn,"SELECT COUNT(Grado) AS count FROM matricula WHERE Grado = '$grado1' AND Letra='$letra1'");
        		$row1 = mysqli_fetch_assoc($query1);
        		$count = $row1['count'];

        		$letra2 = 'B';
        		$grado2 ='Segundo Año';
        		$query2 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_dos FROM matricula WHERE Grado = '$grado2' AND Letra='$letra2'");
        		$row2 = mysqli_fetch_assoc($query2);
        		$count2 = $row2['count_dos'];

        		$letra3 = 'C';
        		$grado3 ='Segundo Año';
        		$query3 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_tres FROM matricula WHERE Grado = '$grado3' AND Letra='$letra3'");
        		$row3 = mysqli_fetch_assoc($query3);
        		$count3 = $row3['count_tres'];

        		$letra4 = 'D';
        		$grado4 ='Segundo Año';
        		$query4 = mysqli_query($conn,"SELECT COUNT(Grado) AS count_cuatro FROM matricula WHERE Grado = '$grado4' AND Letra='$letra4'");
        		$row4 = mysqli_fetch_assoc($query4);
        		$count4 = $row4['count_cuatro'];
        	 ?>
          
          <table>
          	<thead>
          		<tr>
          			<td>Letra</td>
          			<td>Total Matriculados</td>
          			<td>Ver</td>
          		</tr>
          	</thead>
          	<tbody>
          		<tr>
          			<td>Tercer Año A</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado1 . '&letra='. $letra1; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Tercer Año B</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count2 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado2 . '&letra='. $letra2; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Tercer Año C</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count3 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado3 . '&letra='. $letra3; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          		<tr>
          			<td>Tercer Año D</td>
          			<td><?php echo "Matriculados "."<span class='count'>" . $count4 . "</span>"; ?></td>
          			<td><a href="../../pdf/matriculados.php?id=<?php echo $cedula . '&prm='. $permiso.'&grado='. $grado4 . '&letra='. $letra4; ?>" target="blank"><i class="ver fas fa-eye"></i></a></td>
          		</tr>
          	</thead>
          </table>
      </article>
  	</section>
  	<footer>
  		<p>&copy SHOPTECC | 2021 </p>
  	</footer>
 </body>
 </html>