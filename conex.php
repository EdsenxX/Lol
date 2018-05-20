<?php
 	$host="localhost";
 	$user="root";
 	$pw="";
 	$bd="videojuegos";
 	
 	$con=mysqli_connect($host,$user,$pw,$bd) or die("problemas en la conexion");
	$mosAZ=mysqli_query($con,"SELECT * FROM `archivos` ORDER BY rand()")or die("problemas al extrar datos");
	$rowAZ= $mosAZ->fetch_assoc();

?> 
