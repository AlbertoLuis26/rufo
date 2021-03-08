<?php 
  include("../conexion/conexion.php");
  
  if (!isset($_SESSION)) {
    session_start();
  }

   $query = mysqli_query($conn, "SELECT * FROM permiso");
   
  //si el usuario camnbia la direcion de la url existiendo ya una sesion los redirige a la  session iniciada
  if (isset($_SESSION['rol'])) {
    $cedula = $_GET['id'];
    //$permiso = $_GET['prm'];
    switch ($_SESSION['rol']) {
      case 1:
        header("location:../sesion_iniciada/administrador.php?id=$cedula&prm=1");
        break;
      case 2:
        header("location:../sesion_iniciada/estudiante.php?id=$cedula&prm=2");
        break;
      default:
        
    }
  }

 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../imagen\logo_rufo.jpg" />
    <link rel="stylesheet" href="estilos/login.css">
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
      <section id="login">
      <form class="login" action="validar_sesion.php" method="post">
      <label for="">Cedula:</label>
      <div class="input-icono">
        <i class="fas fa-user"></i>
        <input type="text" class="input" name="cedula" value="" placeholder="Ingrese Cedula" onkeyup="this.value=Numeros(this.value)" required>
      </div><br>
      <label for="">Contraseña:</label>
      <div class="input-icono">
        <i class="fas fa-lock"></i>
        <input type="password" class="input" name="contrasena" value="" placeholder="Ingrese Contraseña" required>
      </div><br>
      <label>¿Eres Administrador o Estudiante</label>
      <div class="select-icono">
        <i class="fas fa-angle-down"></i>
         <select name="permiso" required>
          <option></option>
        <?php 
          while($row = mysqli_fetch_assoc($query)){?>
           <option value="<?php echo $row['id_permiso'] ?>"><?php echo $row['Permiso']; ?></option>    
            <?php } ?>
       </select>
      </div>
      <input type="submit" class="submit" name="" value="INGRESAR">
    </form>
    <div class="link">
      <p>No tienes cuenta?<a href="../registrarse/registro.php"> Registrar cuenta</a></p>
      
    </div>
  </section>
  </div>
  </body>
</html>
