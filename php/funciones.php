<?php 

class funciones{

	public static function menu(){
	?>
		<div class="ancho">
			<div class="logo">
				<p><a href="index.php">Analisís</a></p>
			</div>
			<nav>
				<ul>
					<li><a href="index.php"><span class="fa fa-home"></span>Inicio</a></li>
					<li><a href="videojuegos.php"><span class="fa fa-gamepad"></span>Videojuegos</a></li>
					<li><a href="peliculas.php"><span class="fa fa-film"></span>Peliculas</a></li>
					<li><a href="series.php"><span class="fa fa-book"></span>Series</a></li>
					
   						<?php

								$user=$_SESSION['user'];
								$ta=$user;
								include("conex.php");
								$con=mysqli_connect($host,$user,$pw,$bd) or die("problemas en la conexion");
								$sql =mysqli_query($con, "SELECT * FROM `usuarios` WHERE `usuario`='$ta' and `conectado`=1");
								$va=$sql->num_rows;
								
							if ($va<>1 ) {?>
   					<li><a href="login.php"><span class="fa fa-user"></span>Inicia Secion</a></li>
					<?php } else {?>
					<li><a href="validar.php"><span class="fa fa-user"></span>Cerrar Secion</a></li>
					<?php } ?>
					<?php

								$user=$_SESSION['user'];
								$ta=$user;
								include("conex.php");
								$con=mysqli_connect($host,$user,$pw,$bd) or die("problemas en la conexion");
								$sql =mysqli_query($con, "SELECT * FROM `usuarios` WHERE `usuario`='$ta' and `admin`=1");
								$va=$sql->num_rows;
								
							if ($va==1 ) {?>
   					<li><a href="subir.php"><span class="fa fa-user"></span>Administrador</a></li>
					<?php }?>
					
				</ul>
			</nav>
		</div>
	<?php
	}

}

?>