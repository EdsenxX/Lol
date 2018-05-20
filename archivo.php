<?php 
	
	session_start();
	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$ta=$user;
	}

include("conex.php");
	$id = $_GET['id'];

	$con=mysqli_connect($host,$user,$pw,$bd) or die("problemas en la conexion");
	$mos=mysqli_query($con,"SELECT * FROM `archivos` WHERE id=$id")or die("problemas al extrar datos");
	$row= $mos->fetch_assoc();



?>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $row['nombre'];?></title>
<meta charset="utf-8">
<link rel="shortcut icon" href="imagenes/Gamepad.ico">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/panel.css">
<link rel="stylesheet" type="text/css" href="css/redes.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<script src="https://use.fontawesome.com/3370734ed6.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
	<div class="red">
		<div id="facebook"><a href="#" class="fa fa-facebook"></a></div>
		<div id="youtube"><a href="#" class="fa fa-youtube-play"></a></div>
		<div id="twitter"><a href="#" class="fa fa-twitter"></a></div>
		<div id="paypal"><a href="#" class="fa fa-paypal"></a></div>
	</div>
	
	<header>
		<div class="ancho">
			<div class="logo">
				<p><a href="index.php">Ánalisis</a></p>
			</div>
			<nav>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="videojuegos.php">Videojuegos</a></li>
					<li><a href="peliculas.php">Peliculas</a></li>
					<li><a href="series.php">Series</a></li>
					
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
	</header>

	<div class="contenedor">
		
		<center><h1><?php echo $row['nombre'];?></h1></center><br>

		<center>
			<?php 
			if($row['video']<>""){
			echo $row['video'];
			}else{?>
			<center><img src="imagenes/no-video.jpg" class="no"></center>
			<?php } ?>
		</center>
		
		<center><div>

			<div class="controles">
			<i class="fa fa-eye fa-2" aria-hidden="true"></i>
			<p class="visitas"><?php echo $row['visitas']; ?></p>
			<i class="icono fa fa-thumbs-o-up fa-2" aria-hidden="true"></i>
			<i class="icono fa fa-thumbs-o-down fa-2" aria-hidden="true"></i>
			<i class="icono fa fa-heart-o fa-2" aria-hidden="true"></i>
			</div>

		<center>
			<h2 class="sub">Descripcion:</h2>
			<p class="des"><?php echo $row['url'];?></p>
		</center>
		
		<?php if($row['idioma']<>"") { ?>
			<h2 class="sub">Idioma Original:</h2>
			<p class="des"><?php echo $row['idioma'];?></p>
		<?php } ?>		
		<?php if($row['director']<>"") { ?>
			<h2 class="sub">Director:</h2>
			<p class="des"><?php echo $row['director'];?></p>
		<?php } ?>	
		<?php if($row['ejecutivos']<>"") { ?>
			<h2 class="sub">Ejecutivos:</h2>
			<p class="des"><?php echo $row['ejecutivos'];?></p>
		<?php } ?>	
		<?php if($row['cinematografia']<>"") { ?>
			<h2 class="sub">Cinematografía:</h2>
			<p class="des"><?php echo $row['cinematografia'];?></p>
		<?php } ?>	
		<?php if($row['actores']<>"") { ?>
			<h2 class="sub">Actores:</h2>
			<p class="des"><?php echo $row['actores'];?></p>
		<?php } ?>	
		<?php if($row['plataforma']<>"") { ?>
			<h2 class="sub">Plataforma(s):</h2>
			<p class="des"><?php echo $row['plataforma'];?></p>
		<?php } ?>	
		<?php if($row['fecha']<>'0000-00-00' and $row['fecha']<>'' ) { ?>
			<h2 class="sub">Fecha de Salida:</h2>
			<p class="des"><?php echo $row['fecha'];?></p>
		<?php } ?>
		<?php if($row['genero']<>"") { ?>
			<h2 class="sub">Genero(s):</h2>
			<p class="des"><?php echo $row['genero'];?></p>
		<?php } ?>
		<?php if($row['desarrolladores']<>"") { ?>
			<h2 class="sub">Desarroladores:</h2>
			<p class="des"><?php echo $row['desarrolladores'];?></p>
		<?php } ?>
		
		<?php if($row['so']<>"" or $row['procesador']<>"" or $row['ram']<>"" or $row['graficos']<>"" or $row['direct']<>"" or $row['red']<>"" or $row['almacenamiento']<>"") { ?>
		
			<h2 class="sub">Requisitos minimos del sistema:</h2>
			<?php if($row['so']<>"") {?>
			<p class="des"><b>SO:</b> <?php echo $row['so'];?></p>
			<?php } ?>
			<?php if($row['procesador']<>"") {?>
			<p class="des"><b>Procesador:</b> <?php echo $row['procesador'];?></p>
			<?php } ?>
			<?php if($row['ram']<>"") {?>
			<p class="des"><b>Memoria RAM:</b> <?php echo $row['ram'];?></p>
			<?php } ?>
			<?php if($row['graficos']<>"") {?>
			<p class="des"><b>Tarjeta Grafica:</b> <?php echo $row['graficos'];?></p>
			<?php } ?>
			<?php if($row['direct']<>"") {?>
			<p class="des"><b>DirectX: </b><?php echo $row['direct'];?></p>
			<?php } ?>
			<?php if($row['red']<>"") {?>
			<p class="des"><b>RED:</b> <?php echo $row['red'];?></p>
			<?php } ?>
			<?php if($row['almacenamiento']<>"") {?>
			<p class="des"><b>Almacenamiento: </b><?php echo $row['almacenamiento'];?></p>
			<?php } ?>
		<?php } ?>
		</div></center>

	</div>


</script>
</body>
</html>