<?php 
session_start();
 if($_SESSION['rol']!=1){
	 header("location: ./");
 }
include "../conexion.php";
   if(!empty($_POST)){
	   $alert='';
	   if(empty($_POST['nombre']) || empty($_POST['app']) || empty($_POST['apm']) || empty($_POST['usuario']) || empty($_POST['rol']) || empty($_POST['telefono']) || empty($_POST['correo']))
	   {
		   $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
	   } else {
           $id = $_POST['iduser'];
		   $nombre= $_POST['nombre'];
		   $app= $_POST['app'];
		   $apm= $_POST['apm'];
		   $usuario= $_POST['usuario'];
		   $password= $_POST['password'];
		   $rol= $_POST['rol'];
		   $telefono= $_POST['telefono'];
		   $correo= $_POST['correo'];
		   $query= mysqli_query($conection,"SELECT * FROM usuarios 
	   WHERE (usuario='$usuario' AND id!= $id)  
	    OR correo='$correo' AND id!=$id");
		
		   $result= mysqli_fetch_array($query);
		   
		   if($result>0){
			   $alert='<p class="msg_error">El Usuario o Correo ya existen.</p>';
		   } else{
		   if(empty($_POST['password'])){
			   $sql_update= mysqli_query($conection,"UPDATE usuarios
			                                            SET nombre= '$nombre',app='$app',apm='$apm',usuario='$usuario',rol='$rol',telefono='$telefono',correo='$correo'
														WHERE id=$id");
		   }else{
			   $sql_update= mysqli_query($conection,"UPDATE usuarios
			                                            SET nombre= '$nombre',app='$app',apm='$apm',usuario='$usuario',password='$password',rol='$rol',telefono='$telefono',correo='$coreo'
														WHERE id=$id");
		    }
		
				if($sql_update){
					$alert='<p class="msg_save">Usuario Actualizado Correctamente</p>';
				}else{
					$alert='<p class="msg_error">Error al Actualizar usuario</p>';
				}												
		   }
	   }
	   mysqli_close($conection);
   }
   //Mostrar Datos
   if(empty($_GET['id'])){
	   header('Location: lista_usuario.php');
	   mysqli_close($conection);
   }
   $idusuario = $_GET['id'];
   
   $sql= mysqli_query($conection,"SELECT u.id, u.nombre,u.app,u.apm,u.usuario,u.correo,u.telefono,(u.rol) as idrol,(r.rol) as rol FROM usuarios u INNER JOIN rol r ON u.rol= r.idrol WHERE id=$idusuario");
   mysqli_close($conection);
   $result_sql= mysqli_num_rows($sql);
   if($result_sql==0){
	   header('Location: lista_usuario.php');
   }else{
	   $option= '';
	   while($data=mysqli_fetch_array($sql)){
		   $idusuario= $data['id'];
		   $nombre= $data['nombre'];
		   $app= $data['app'];
		   $apm= $data['apm'];
		   $usuario= $data['usuario'];
		   $idrol= $data['idrol'];
		   $rol= $data['rol'];
		   $telefono= $data['telefono'];
		   $correo= $data['correo'];
		   
		   if($idrol==1){
			   $option = '<option value="'.$idrol.'" select>'.$rol.'<?php echo $rol["rol"] ?></option>';
		   }else if($idrol==2){
			   $option = '<option value="'.$idrol.'" select>'.$rol.'<?php echo $rol["rol"] ?></option>';
		   }else if($idrol==3){
			   $option = '<option value="'.$idrol.'" select>'.$rol.'<?php echo $rol["rol"] ?></option>';
		   }
		   
	   }
   }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<title>Actualizar Usuario</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section id="container">
      <div class="form_register">
	  <h1>Actualizar Usuario</h1>
	  <hr>
	  <div class="alert"><?php echo isset($alert)? $alert: ''; ?></div>
	  <form action="" method="post">
	  <input type="hidden" name="iduser" value="<?php echo $idusuario; ?>">
	  <label for="nombre">Nombre</label>
	  <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
	  <label for="app">Apellido Paterno</label>
	  <input type="text" name="app" id="app" value="<?php echo $app; ?>">
	  <label for="apm">Apellido Materno</label>
	  <input type="text" name="apm" id="apm" value="<?php echo $apm; ?>">
	  <label for="usuario">Usuario</label>
	  <input type="text" name="usuario" id="usuario" value="<?php echo $usuario; ?>">
	  <label for="password">Password</label>
	  <input type="password" name="password" id="password">
	  <label for="rol">Tipo Usuario(Rol)</label>
	  <?php 
	  include "../conexion.php";
	  $query_rol= mysqli_query($conection,"SELECT * FROM rol");
	  mysqli_close($conection);
	  $result_rol = mysqli_num_rows($query_rol);
	  ?>
	  <select name="rol" id="rol" class="notItem">
	  <?php
	  echo $option;
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
	  <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>">
	  <label for="correo">Correo</label>
	  <input type="email" name="correo" id="correo" value="<?php echo $correo; ?>">
	  <input type="submit" value="Actualizar Usuario" class="btn_save">
	 
	  </form>
	  </div>
	</section>
	<?php include "footer.php"; ?>
</body>
</html>