<?php
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';
	$contrasena = $_POST['contraseña'];
	$nombre = $_POST['nombre'];	
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$edad = $_POST['edad'];
	$ciudad = $_POST['ciudad'];
	//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("INSERT INTO usuarios (contrasena, nombre, apellidos, email, edad, ciudad) VALUES (?,?,?,?,?,?);");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$contrasena, $nombre, $apellidos, $email, $edad, $ciudad]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo("NO SE HA INSERTADO CORRECTAMEN");
	}
?>