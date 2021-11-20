<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<title>Sistema Reportes</title>
</head>
<body>
  <?php include "header.php"; ?>
  <section id="container">
		<h1>Bienvenido al sistema</h1>
	</section>
	<hr>
	  <div class="alert"></div>
	  <div class="form-index">
	  <form action="" method="post">
	  <input type="hidden" name="iduser" value="">
	  <label for="nombre">Nombre</label>
	  <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>">
	  <label for="app">Apellido Paterno</label>
	  <input type="text" name="app" id="app" value="<?php echo $_SESSION['app']; ?>">
	  <label for="apm">Apellido Materno</label>
	  <input type="text" name="apm" id="apm" value="<?php echo $_SESSION['apm']; ?>">
	  <label for="usuario">Usuario</label>
	  <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>">
	  <label for="telefono">Telefono</label>
	  <input type="text" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono']; ?>">
	  <label for="correo">Correo</label>
	  <input type="email" name="correo" id="correo" value="<?php echo $_SESSION['correo']; ?>">	 
	  </form>
	  </div> 
	<?php include "footer.php"; ?>
</body>
</html>