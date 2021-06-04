<?php
	include_once "funciones/funciones.php";

	if(isset ($_POST['nombre'])){
 		$nombre = $_POST['nombre'];
 	}

	if(isset ($_POST['apellido'])){
 		$apellido = $_POST['apellido'];
 	}

	if(isset ($_POST['email'])){
 		$email = $_POST['email'];
 	}

	if(isset ($_POST['boletos'])){
		$boletos_adquiridos = $_POST['boletos'];
 	}

	if(isset ($_POST['pedido_extra']['camisas']['cantidad'])){
		$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
 	}

	if(isset ($_POST['pedido_extra']['etiquetas']['cantidad'])){
		$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
 	}

	$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

	if(isset ($_POST['total_pedido'])){
		$total = $_POST['total_pedido'];
 	}

	if(isset ($_POST['regalo'])){
		$regalo = $_POST['regalo'];
 	}

	if(isset ($_POST['registro_evento'])){
		$eventos = $_POST['registro_evento'];
		$registro_eventos = eventos_json($eventos);
 	}

	if(isset ($_POST['fecha_registro'])){
		$fecha_registro = $_POST['fecha_registro'];
 	}
	
	if(isset ($_POST['id_registro'])){
		$id_registro = $_POST['id_registro'];
 	} 	

  if (isset($_POST['registro']) && $_POST['registro'] == 'nuevo') {

		try {
			$stmt = $conn->prepare('INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,NOW(),?,?,?,?,1)');
			$stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
			$stmt->execute();
			$id_insertado = $stmt->insert_id;

			if($stmt->affected_rows){
				$respuesta = array(
					'respuesta' => 'exito',
					'id_insertado' => $id_insertado
				);
			}else{
				$respuesta = array(
					'respuesta' => 'error'
				);
			}	
			$stmt->close();
			$conn->close();

		} catch (Exception $e) {
			$respuesta = array(
				'respuesta' => $e->getMessage()
			);			
		}
		die (json_encode($respuesta));
	}

	if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
		try{
			$stmt = $conn->prepare('UPDATE registrados SET  nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalo = ?, total_pagado = ?, pagado = 1 WHERE ID_Registrado = ?');
			$stmt->bind_param('ssssssisi', $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
			$stmt->execute();
			if($stmt->affected_rows){
				$respuesta = array (
					'respuesta' => 'exito',
					'id_actualizado' => $id_registro
				);
			}else {
				$respuesta = array(
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
				$stmt = $conn->prepare('DELETE FROM registrados WHERE ID_Registrado = ? ');
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




