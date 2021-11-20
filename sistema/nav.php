<nav>
	   <ul>
	       <li><a href="index.php">Inicio</a></li>
		   <?php
				if($_SESSION['rol']==1){
					
				?>
				<li class="principal">
			
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="alta_usuario.php">Dar de Alta Usuario</a></li>
						<li><a href="lista_usuario.php">Lista de Usuarios</a></li>
					</ul>
					</li>
				<?php } ?>
				<li class="principal">
					<a href="#">Archivos</a>
					<ul>
						<li><a href="#">Subir Archivos</a></li>
						<li><a href="#">Lista de Archivos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Reportes</a>
					<ul>
						<li><a href="#">Generar Reportes</a></li>
						<li><a href="#">Lista de Reportes</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Manuales</a>
					<ul>
						<li><a href="#">Tecnico</a></li>
						<li><a href="#">Usuario</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="index.php">Datos Personales</a>
					
				</li>
			
	   </ul>
	</nav>