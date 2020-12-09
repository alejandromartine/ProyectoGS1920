<?php 
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';

	$id = $_POST['id2'];
	$contrasena = $_POST['contraseña'];
	$nombre = $_POST['nombre'];	
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$edad = $_POST['edad'];
	$ciudad = $_POST['ciudad'];
//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("UPDATE usuarios SET contrasena = ?, nombre = ?, apellidos = ?, email = ?, edad = ?, ciudad = ? WHERE id = ?;");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$contrasena, $nombre, $apellidos, $email, $edad, $ciudad, $id]);

	if ($resultado === true) {
		header('Location: login_usuarios.php');
	}else{
		echo "error al editar el usuario";
	}
 ?>