<?php 
	require 'conexion.php';
	//SE REOCGEN LOS DATOS DEL FORMULARIO
	$passActual = $_POST['contrasena'];
	$id = $_POST['id2'];
	$comp = $_POST['oculto'];
	$pass = $_POST['contrasena_nueva'];
	//RECOGEMOS EL VALOR DE LA CONTRASEÑA PARA COMPARARLO CON LA QUE HEMOS INTRODUCIDO
	$sentencia2 = $bd->prepare('SELECT * FROM clientes WHERE id_cliente = ?;');
	$sentencia2->execute([$id]);
	$valor2 = $sentencia2->fetch(PDO::FETCH_OBJ);
	//ALMACENAMOS EL VALOR DE LA CONTRASEÑA PARA HACER LA COMPARACIÓN.
	$Vpass = $valor2->password;

	$sentencia = $bd->prepare("UPDATE clientes SET password = ?   WHERE id_cliente = ? AND password = ?;");

	if ($passActual == $valor2->password) {
		//EJECUTAMOS LA ORDEN DE INSERTAR
		$resultado = $sentencia->execute([$pass, $id, $passActual]);
		header("Location: cliente_contrasena.php?good=true&id=$id");
	}else{
		header("Location: cliente_contrasena.php?error=true&id=$id");
	}
 ?>