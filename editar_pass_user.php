<?php 
	require 'conexion.php';
	//SE REOCGEN LOS DATOS DEL FORMULARIO
	$passActual = $_POST['contrasena'];
	$id = $_POST['id2'];
	$comp = $_POST['oculto'];
	$pass = $_POST['contrasena_nueva'];
	$pass_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>4]);
	$password = $pass_segura;
	//RECOGEMOS EL VALOR DE LA CONTRASEÑA PARA COMPARARLO CON LA QUE HEMOS INTRODUCIDO
	$sentencia2 = $bd->prepare('SELECT * FROM clientes WHERE id_cliente = ?;');
	$sentencia2->execute([$id]);
	$valor2 = $sentencia2->fetch(PDO::FETCH_OBJ);
	//VERIFICAMOS QUE LAS CONTRASEÑAS COINCIDEN
	$Vpass = password_verify($passActual, $valor2->password);


	if ($Vpass == true) {
		$sentencia = $bd->prepare("UPDATE clientes SET password = ?   WHERE id_cliente = ?;");
		//EJECUTAMOS LA ORDEN DE INSERTAR
		$resultado = $sentencia->execute([$password, $id]);
		header("Location: cliente_contrasena.php?good=true&id=$id");
	}else{
		header("Location: cliente_contrasena.php?error=true&id=$id");
	}
 ?>