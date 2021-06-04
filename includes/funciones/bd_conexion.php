<?php 
	//creamos conexion mysql a:
	//host local, nombre usuario mysql, password user, nombre base datos
	//en caso de exito conn representa a la bd, en este caso gdlwebcam
	$conn = new mysqli('localhost','root','','gdlwebcam');
	if($conn->connect_error){
		echo $error -> $conn->connect_error;
	}
 ?>
