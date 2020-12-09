<?php 
	//EN ESTE CODIGO SE CREAN LAS CUENTAS DE LOS USUARIOS
	if (!isset($_POST['oculto'])) {
		header('Location: registro.php');
	}
	//LLAMA AL ARCHIVO QUE CONECTA CON LA BASE DE DATOS
	require 'conexion.php';
	//SE ALMACENAN LOS DATOS INTRODUCIDOS EN EL FORMULARIO.
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];	
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$telefono= $_POST['telefono'];
	$direccion = $_POST['direccion'];

	//CREAMOS LA SENTENCIA PARA INSERTAR LOS DATOS EN LA BASE DE DATOS
	$sentencia = $bd->prepare("INSERT INTO clientes (nombre_cliente, apellidos, telefono_cliente, email_cliente, direccion_cliente, password) VALUES (?,?,?,?,?,?);");
	//EJECUTAMOS LA INSERCCIÓN DE CODIGO
	$resultado = $sentencia->execute([$nombre, $apellidos, $telefono, $email, $direccion, $contrasena]);

	if ($resultado === TRUE) {
		header('Location: login_usuarios.php');
	}else{
		echo("algo ha fallado");
	}

 ?>