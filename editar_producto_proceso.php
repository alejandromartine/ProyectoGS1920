<?php
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';
	$id = $_POST['id2'];
	$nombre_producto = $_POST['nombre'];
	$desc_producto = $_POST['desc'];	
	$code_producto = $_POST['code'];
	$precio_producto = $_POST['precio'];
	$tipo_producto = $_POST['tipo'];
	//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("UPDATE lista_productos SET nombre_producto = ?, desc_producto = ?, code_producto = ?, precio_producto = ?, tipo_producto = ? WHERE id = ?;");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$nombre_producto, $desc_producto, $code_producto, $precio_producto, $tipo_producto, $id]);

	if ($resultado === TRUE) {
		header('Location: show_products.php');
	}else{
		echo $imagen_producto;
	}
?>

