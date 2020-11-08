<?php 
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	$codigo = $_GET['id'];
	require 'conexion.php';
	$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if($resultado===true){
		header('Location: index.php');
	}else{
		echo "Error al eliminar el usuario";
	}
 ?>