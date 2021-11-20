<?php 
session_start();
 if($_SESSION['rol']!=1){
	 header("location: ./");
 }
  include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<title>Lista Usuarios</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section id="container">
		<h1>Lista de Usuarios</h1>
		<a href="alta_usuario.php" class="btn_new">Crear Usuario</a>
		<table>
		  <tr>
		    <th>ID</th>
			<th>Nombre</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Rol</th>
			<th>Acciones</th>
		  </tr>
		  <?php 
		     $query= mysqli_query($conection,"SELECT u.id, u.nombre, u.correo, u.usuario, r.rol FROM usuarios u INNER JOIN rol r on u.rol= r.idrol WHERE estatus=1");
			 mysqli_close($conection);
			 $result = mysqli_num_rows($query);
			 if($result>0){
				 while($data = mysqli_fetch_array($query)){
			?>		 
				<tr>
				<td><?php echo $data["id"] ?></td>
				<td><?php echo $data["nombre"] ?></td>
				<td><?php echo $data["usuario"] ?></td>
				<td><?php echo $data["correo"] ?></td>
				<td><?php echo $data["rol"] ?></td>
				<td>
		        <a class="link_edit" href="Editar.php?id=<?php echo $data["id"] ?>">Editar |</a>
				<?php if($data['id']!=1){
					
				?>
			    <a class="link_delate" href="Eliminar.php?id=<?php echo $data["id"] ?>">Eliminar</a> 
                <?php } ?>				
				</td>
				</tr>
			<?php
				 }
			 }
		  ?>
		 
		</table>
	</section>
	<?php include "footer.php"; ?>
</body>
</html>