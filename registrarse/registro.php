<?php
	include('../conexion/conexion.php');
	$sql = mysqli_query($conn,"SELECT * FROM permiso "); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO</title>
	<link rel="stylesheet" type="text/css" href="estilos/registro.css">
	<link rel="shortcut icon" href="../imagen\logo_rufo.jpg" />
	<script type="text/javascript">
		function Numeros(string){//Solo numeros
   		 var out = '';
    	 var filtro = '1234567890';//Caracteres validos
	
    	//Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    	for (var i=0; i<string.length; i++)
    	   if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	    	 out += string.charAt(i);
	
    	//Retornar valor filtrado
    	return out;
		} 
	</script>
</head>
<body>
	<div id="fondo">
		<section id="registro">
			<h1>CREAR CUENTA</h1>
			<form action="guardar_registrase.php" method="post">
				<!--<label> Nombre:</label>-->
				<input type="text" class="mayuscula" name="nombre" placeholder="Ingrese Nombre" required>
				<!--<label>Apellido:</label>-->
				<input type="text" class="mayuscula" name="apellido" placeholder="Ingrese Apellido" required>
				<!--<label>Cedula:</label>-->
				<input type="text" name="cedula" placeholder="Ingrese Cedula" onkeyup="this.value=Numeros(this.value)" required>
				<label>¿Eres Estudiante o Administrador?</label>
				<select name="permiso" required>
					<option></option>
					
					<?php 
					while ($row=mysqli_fetch_assoc($sql)) { ?>
						<option value="<?php echo $row['id_permiso'] ?>" ><?php echo $row['Permiso']?></option>
					<?php }
					 ?>
				</select>
				<!--<label>Telefono:</label>-->
				<input type="tel" name="telefono" value="" placeholder="Ingrese Telefono" required>
				<!--<label>Contraseña:</label>-->
				<input type="password" name="contrasena" placeholder="Ingrese Contraseña" required>
				<!--<label>Confirmar Conrraseña:</label>-->
				<input type="password" name="con_contrasena" placeholder="Confirmar Contraseña" required>
				<label>Añade Año en que Cursa:</label>
				<select name="grado" >
					<option></option>
					<option>Primer Año</option>
					<option>Segundo Año</option>
					<option>Tercer Año</option>
				</select>
				<input type="submit" class="submit" name="" value="GUARDAR | ENVIAR">
			</form>	
		</section>
	</div>
</body>
</html>
