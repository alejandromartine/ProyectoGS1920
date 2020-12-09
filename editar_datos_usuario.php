<?php 
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	require 'conexion.php';
	//SE REOCGEN LOS DATOS DEL FORMULARIO
	$id = $_POST['id2'];
	$nombre_cliente = $_POST['nombre'];	
	$apellidos = $_POST['apellidos'];
	$telefono_cliente = $_POST['telefono'];
	$email_cliente = $_POST['email'];
	//CREAMOS LA SENTENCIA PARA EVITAR LA INJECCION DE CODIGO MYSQL, PARA USAMOS PREPARE
	$sentencia = $bd->prepare("UPDATE clientes SET nombre_cliente = ?, apellidos = ?, telefono_cliente = ?, email_cliente = ? WHERE id_cliente = ?;");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$nombre_cliente, $apellidos, $telefono_cliente, $email_cliente, $id]);

	if ($resultado === true) {
		header('Location: index_clientes.php');
	}else{
		echo "error al editar el usuario";
	}
 ?>