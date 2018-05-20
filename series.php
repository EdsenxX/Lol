<?php 
session_start();
	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$ta=$user;
	}

include("php/funciones.php");

include("conex.php");

	$con=mysqli_connect($host,$user,$pw,$bd) or die("problemas en la conexion");
	$mos=mysqli_query($con,"SELECT * FROM `archivos` WHERE `categoria`='Serie' ORDER BY`id`DESC")or die("problemas al extrar datos");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Serrano´s VideoGames</title>
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
		<?php 
			funciones::menu();
		?>
	</header>
	
	
	
	<section>
	
	<div id="con">
				<?php
					$br=0;$N=0;
					while ($row= $mos->fetch_assoc()) {

						$N=$N+1;
						echo "<!--<p>";
				          $b="openSip".$a++;
				          	#echo $b ;

				          	$long=13;
				          	$lonM=substr(strip_tags($row['Nombre_Libro']), 0, $long);
				          	if (strlen(strip_tags($row['Nombre_Libro'])) > $long){
			        			$lonM .= '';
				          	}
				         echo("</p>	-->");
			    ?>
				
	<a href="archivo.php?id=<?php echo $row['id']; ?>"><div class="contenedor">
		<div class="elemento">
			<img src="<?php echo $row['imagen'];?>">
			<center><p><?php echo $row['nombre'];?></p></center>
			<p><?php echo $row['url'];?></p>
		</div>
	</div></a>
								<?php
								$N=$N+1;
							}	
					?>
			</div>
	</section>
</body>

</html>