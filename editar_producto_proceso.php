<?php
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';
	$id = $_POST['id2'];
	$nombre_producto = $_POST['nombre'];
	$desc_producto = $_POST['desc'];	
	$code_producto = $_POST['code'];
	$imagen_producto = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$precio_producto = $_POST['precio'];
	$tipo_producto = $_POST['tipo'];
	//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("UPDATE lista_productos SET nombre_producto = '$nombre_producto', desc_producto = '$desc_producto', code_producto = '$code_producto', imagen_producto = '$imagen_producto', precio_producto = '$precio_producto', tipo_producto = '$tipo_producto' WHERE id = '$id';");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute();

	if ($resultado === TRUE) {
		header('Location: show_products.php');
	}else{
		echo "ha ocurrido un error";
	}
?>