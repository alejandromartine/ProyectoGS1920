<?php 
	include_once 'conexion.php';
	session_start();

	$email = $_POST['email'];
	$pass = $_POST['contrasena'];

	//CREAMOS LA SENTENCIA QUE BUSCA LOS DATOS EN LA BASE DE DATOS
	$sentencia2 = $bd->prepare('SELECT * FROM clientes WHERE email_cliente = ? AND password = ?;');
	$sentencia2->execute([$email, $pass]);

	$valor2 = $sentencia2->fetch(PDO::FETCH_OBJ);

	$sentencia = $bd->prepare('SELECT * FROM usuarios WHERE email = ? AND contrasena = ?;');
	$sentencia->execute([$email, $pass]);
	$valores = $sentencia->fetch(PDO::FETCH_OBJ);



	if ($sentencia->rowcount() == 1){
		$_SESSION['apellidos'] = $valores->apellidos;
		$_SESSION['nombre'] = $valores->nombre;
		$_SESSION['email'] = $valores->email;
		header('Location: index.php');

	}elseif ($sentencia2->rowcount() == 1) {
		$_SESSION['nombre'] = $valor2->nombre_cliente;
		$_SESSION['apellidos'] = $valor2->apellidos;
		$_SESSION['email'] = $valor2->email_cliente;
		header('Location: index_clientes.php');

	}else{
		header("Location: login_usuarios.php?error=true");
	}
 ?>