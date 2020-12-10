<?php 
	include_once 'conexion.php';
	session_start();

	$email = $_POST['email'];
	$pass = $_POST['contrasena'];

	//RECOGEMOS LOS DATOS DE LOS USUARIOS DONDE COINCIDAN EMAIL Y CONTRASEÑA, EN CASO DE COINCIDIR EL ELSEIF LO RECORRE Y ALMACENA LOS DATOS EN SESIONES
	$sentencia = $bd->prepare('SELECT * FROM usuarios WHERE email = ? AND contrasena = ?;');
		$sentencia->execute([$email, $pass]);
		$valores = $sentencia->fetch(PDO::FETCH_OBJ);
	//HACEMOS LA CONSULTA PARA COGER EL HASH DE LA CONTRASEÑA
	$verificar = $bd->prepare('SELECT * FROM clientes WHERE email_cliente = ?;');
	$verificar->execute([$email]);
	$values = $verificar->fetch(PDO::FETCH_OBJ);

	//VERIFICAMOS QUE LAS CONTRASEÑAS DE LOS USUARIOS COINCIDEN
	$verify = password_verify($pass, $values->password);

	if ($verify == true) {
		//CREAMOS LA SENTENCIA QUE BUSCA LOS DATOS EN LA BASE DE DATOS
		$sentencia2 = $bd->prepare('SELECT * FROM clientes WHERE email_cliente = ?;');
		$sentencia2->execute([$email]);

		$valor2 = $sentencia2->fetch(PDO::FETCH_OBJ);

		$_SESSION['nombre'] = $valor2->nombre_cliente;
		$_SESSION['apellidos'] = $valor2->apellidos;
		$_SESSION['email'] = $valor2->email_cliente;
		header('Location: index_clientes.php');

	}elseif ($sentencia->rowcount() == 1) {

			$_SESSION['apellidos'] = $valores->apellidos;
			$_SESSION['nombre'] = $valores->nombre;
			$_SESSION['email'] = $valores->email;
			header('Location: index.php');

	}else{
		header("Location: login_usuarios.php?error=true");
	}
	
 ?>