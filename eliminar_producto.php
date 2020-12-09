<?php 
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	$codigo = $_GET['id'];
	require 'conexion.php';
	$sentencia = $bd->prepare("DELETE FROM lista_productos WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if($resultado===true){
		header('Location: show_products.php');
	}else{
		echo "Error al eliminar el producto";
	}
 ?>