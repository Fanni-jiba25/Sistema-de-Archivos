<?php 
		
		//session_start();
		if(empty($_SESSION['active'])){
			header('location: ../');
		}
?>
<header>
    <div class="header">
	<h1>SISTEMA DE REPORTES</h1>
	<div class="optionsBar">
	<span class"user"><?php echo $_SESSION['usuario'].'-'.$_SESSION['rol'];?> </span>
	<img class="photouser" src="img/user.png" alt="Usuario">
	<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
	</div>
	</div>
	 <?php include "nav.php";?>
  </header>