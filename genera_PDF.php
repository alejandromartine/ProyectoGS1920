<?php
	include'conexion.php';
 	include'carrito.php';

 	$id_venta = $_POST['id_venta'];

 	$sentencia=$bd->prepare("SELECT * FROM `detalleventa`,`lista_productos` WHERE detalleventa.id=lista_productos.id AND detalleventa.id_venta = :id_venta");
		
		$sentencia->bindParam(':id_venta', $id_venta);
		$sentencia->execute();

		$lista_productos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

	if ($sentencia->rowCount()>0) {
		echo "Archivo en descarga...";

		$NombreArchivo = "archivos/".$lista_productos[0]['id'].".pdf";
		}	

		$nuevoNombreArchivo = $_POST['id_venta'].".pdf";

		echo $nuevoNombreArchivo;

		header("Content-Transfer-Encoding: binary");
		header("content-type: application/force-dowload");
		header("Content-Disposition: attachment; filename=$nuevoNombreArchivo");
		readfile($NombreArchivo);
?>