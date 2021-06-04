
<?php include_once 'includes/templates/header.php';?>
<section class="seccion contenedor">
	<h2>Resumen Registro</h2>
	<?php 
		$resultado = $_GET['exito']; 
		$id_pago = (int) $_GET['id_pago'];

		
		if($resultado == "true") {
			$paymentId = $_GET['paymentId'];

			echo "El pago se realizó correctamente <br>";
			echo "el ID es {$paymentId}";

			require_once('includes/funciones/bd_conexion.php');
			$stmt = $conn->prepare("UPDATE `registrados` SET `pagado` = ? WHERE `ID_Registrado` = ?");
			$pagado = 1;
			$stmt->bind_param("ii", $pagado, $id_pago);
			$stmt->execute();
			$stmt->close();
			$conn->close();

		} else {
			echo "el pago no se realizo";
			/***************************************/
			
			$id = htmlspecialchars($_GET['id_pago']);
			try{
				require_once('includes/funciones/bd_conexion.php');
				$sql = "DELETE FROM `registrados` WHERE `ID_Registrado` IN ({$id});";
				$resultado = $conn->query($sql);
			}catch(Exception $e){
				$error = $e->getMessage();	
			}
			$conn->close();

			/**************************************/
		}
	?>

</section>
<?php include_once 'includes/templates/footer.php';?>
