<?php 
session_start();
 if($_SESSION['rol']!=1){
	 header("location: ./");
 }
include "../conexion.php";
   if(!empty($_POST)){
	   $alert='';
	   if(empty($_POST['nombre']) || empty($_POST['app']) || empty($_POST['apm']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['telefono']) || empty($_POST['correo']))
	   {
		   $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
	   } else {
       
		   $nombre= $_POST['nombre'];
		   $app= $_POST['app'];
		   $apm= $_POST['apm'];
		   $usuario= $_POST['usuario'];
		   $password= $_POST['password'];
		   $rol= $_POST['rol'];
		   $telefono= $_POST['telefono'];
		   $correo= $_POST['correo'];
		   $query= mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario='$usuario' OR correo='$correo'");
		   mysqli_close($conection);
		   $result= mysqli_fetch_array($query);
		   
		   if($result>0){
			   $alert='<p class="msg_error">El Usuario o Correo ya existen.</p>';
		   } else{
			   include "../conexion.php";
			   $query_insert = mysqli_query($conection,"INSERT INTO usuarios(nombre,app,apm,usuario,password,rol,telefono,correo)
			                                                          VALUES('$nombre','$app','$apm','$usuario','$password','$rol','$telefono','$correo')");
			   mysqli_close($conection);
				if($query_insert){
					$alert='<p class="msg_save">Usuario Creado Correctamente</p>';
				}else{
					$alert='<p class="msg_error">Error al crear usuario</p>';
				}												
		   }
	   }
   }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<title>Dar de Alta Usuario</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section id="container">
      <div class="form_register">
	  <h1>Registro de Usuario</h1>
	  <hr>
	  <div class="alert"><?php echo isset($alert)? $alert: ''; ?></div>
	  <form action="" method="post">
	  <label for="nombre">Nombre</label>
	  <input type="text" name="nombre" id="nombre">
	  <label for="app">Apellido Paterno</label>
	  <input type="text" name="app" id="app">
	  <label for="apm">Apellido Materno</label>
	  <input type="text" name="apm" id="apm">
	  <label for="usuario">Usuario</label>
	  <input type="text" name="usuario" id="usuario">
	  <label for="password">Password</label>
	  <input type="password" name="password" id="password">
	  <label for="rol">Tipo Usuario(Rol)</label>
	  <?php 
	  include "../conexion.php";
	  $query_rol= mysqli_query($conection,"SELECT * FROM rol");
	  mysqli_close($conection);
	  $result_rol = mysqli_num_rows($query_rol);
	  ?>
	  <select name="rol" id="rol">
	  <?php
	  if($result_rol>0){
		  while($rol = mysqli_fetch_array($query_rol)){
	?>
             <option value="<?php echo $rol["idrol"];?>"><?php echo $rol["rol"] ?></option>
      <?php			 
	  }
	  }
	  ?>
	  </select>
	  <label for="telefono">Telefono</label>
	  <input type="text" name="telefono" id="telefono">
	  <label for="correo">Correo</label>
	  <input type="email" name="correo" id="correo">
	  <input type="submit" value="Crear Usuario" class="btn_save">
	 
	  </form>
	  </div>
	</section>
	<?php include "footer.php"; ?>
</body>
</html>