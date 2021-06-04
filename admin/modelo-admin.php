<?php
	include_once "funciones/funciones.php";
 	if(isset ($_POST['usuario'])){
 		$usuario = $_POST['usuario'];
 	}

 	if(isset ($_POST['nombre'])){
 		$nombre = $_POST['nombre'];
 	}

 	if(isset ($_POST['password'])){
	 	$password = $_POST['password'];
	}

 	if(isset ($_POST['id_registro'])){
 		$id_registro = $_POST['id_registro'];
	}
  

	if (isset($_POST['registro']) && $_POST['registro'] == 'nuevo') {
	 	$opciones = array(
	 		'cost' => 12 
	 	);

	 	$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

	 	try{
			$stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, editado, nivel) VALUES (?, ?, ?, NOW(), 0)");
			$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
			$stmt->execute();
			$id_registro = $stmt->insert_id;
			if($id_registro > 0){
				$respuesta = array(
					'respuesta' => 'exito',
					'id_admin' => $id_registro
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);				
			}
			$stmt->close();
			$conn->close();
	 	} catch (Exception $e) {
	 		echo "Error: ". $e->getMessage();
	 	}

		die(json_encode($respuesta));

	}

	if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){

		try{

	  	$opciones = array(
				'cost' => 12
			);
	  	
	  	if(empty($_POST['password'])){
	  		$stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?");
	  		$stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
	  	} else {
				$hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
				$stmt= $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW()  WHERE id_admin = ?');
				$stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
	  	}

			$stmt->execute();
			if($stmt->affected_rows){
				$respuesta = array(
					'respuesta' => 'exito',
					'id_actualizado' => $stmt->insert_id
				);
			} else {
				$respuesta = array (
					'respuesta' => 'error'
				);
			}
			$stmt->close();
			$conn->close();
		}catch (Exception $e){
			$respuesta = array (
				'respuesta' => $e->getMessage()
			);
		}

		die(json_encode($respuesta));
	}

	if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){
			$id_borrar = $_POST['id'];

			try{
				$stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
				$stmt->bind_param('i', $id_borrar);
				$stmt->execute();
				if($stmt->affected_rows){
					$respuesta = array(
						'respuesta' => 'exito',
						'id_eliminado' => $id_borrar
					);
				} else {
					$respuesta = array(
						'respuesta' => 'error'
					);					
				}
			} catch (Exception $e){
				$respuesta = array(
					'respuesta' => $e->getMessage()
				);
			}
			die(json_encode($respuesta));
	}


?>




