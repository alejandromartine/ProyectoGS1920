<?php
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';
	$nombre_producto = $_POST['nombre'];
	$desc_producto = $_POST['desc'];	
	$code_producto = $_POST['code'];
	$imagen_producto = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$precio_producto = $_POST['precio'];
	$tipo_producto = $_POST['tipo'];
	//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("INSERT INTO lista_productos (`nombre_producto`, `desc_producto`, `code_producto`, `imagen_producto`, `precio_producto`, `tipo_producto`) VALUES (?,?,?,?,?,?)");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$nombre_producto, $desc_producto, $code_producto, $imagen_producto, $precio_producto, $tipo_producto]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo("No se inserto");
	}
?>