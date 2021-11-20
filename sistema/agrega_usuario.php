<?php 
 if(!empty($_POST))
 {
	 $alert='';
	 if(empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['nombre']) || empty($_POST['app']) || empty($_POST['apm']) || empty($_POST['telefono']) || empty($_POST['correo']))
	 {
		 $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
	 } else{
		 include "../conexion.php";
		 $usuario = $_POST['usuario'];
		 $password = $_POST['password'];
		 $rol = $_POST['rol'];
		 $nombre = $_POST['nombre'];
		 $app = $_POST['app'];
		 $apm = $_POST['apm'];
		 $telefono = $_POST['telefono'];
		 $correo = $_POST['correo'];
		 
		 $query = mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario= '$usuario' OR correo='$correo'");
		 $result= mysqli_fetch_array($query);
		 if($result>0){
			 $alert= '<p class="msg_error">El correo o el usuario ya existen</p>';
		 } else{
			 $query_insert = mysqli_query($conection,"INSERT INTO usuarios(usuario,password,rol,nombre,app,apm,telefono,correo) 
			                                                       VALUES('$usuario','$password','$rol','$nombre','$app','$apm','$telefono','$correo')");
			 
			 if($query_insert){
				 $alert= '<p class="msg_save">Usuario Creado Correctamente.</p>';
			 } else {
				  $alert= '<p class="msg_error">Eror al crear usuario.</p>';
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
	<title>Registro Usuario</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section id="container">
		<div class="form_register">
		 <h1>Dar de Alta Usuario</h1>
		 <hr>
		 <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		 <form action="" method="post">
			<label for="usuario">Usuario</label>
			<input type="text" name="usuario" id="usuario" placeholder="" >
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="" >
			<label for="rol">Tipo Usuario(Rol)</label>
			<select name="rol" id="rol">
			<option value"1">Administrador</option>
			<option value"2">Gerente</option>
			<option value"3">Supervisor</option>
			</select>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" placeholder="" >
			<label for="app">Apellido Paterno</label>
			<input type="text" name="app" id="app" placeholder="" >
			<label for="apm">Apellido Materno</label>
			<input type="text" name="apm" id="apm" placeholder="" >
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" id="telefono" placeholder="" >
			<label for="correo">Correo Electronico</label>
			<input type="email" name="correo" id="correo" placeholder="" >
			<input type="submit" value="Crear Usuario" class="btn_save">
			
		 </form>
		</div>
	</section>
	<?php include "footer.php"; ?>
</body>
</html>
