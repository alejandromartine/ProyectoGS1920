<?php 
	require 'conexion.php';
	//SE REOCGEN LOS DATOS DEL FORMULARIO
	$direccion_cliente = $_POST["direccion_nueva"];
	$id = $_POST["id2"];
	//RECOGEMOS EL VALOR DE LA CONTRASEÑA PARA COMPARARLO CON LA QUE HEMOS INTRODUCIDO
	$sentencia2 = $bd->prepare('SELECT * FROM clientes WHERE id_cliente = ?;');
	$sentencia2->execute([$id]);
	$valor2 = $sentencia2->fetch(PDO::FETCH_OBJ);
	$sentencia = $bd->prepare("UPDATE clientes SET direccion_cliente = ?   WHERE id_cliente = ?;");
	//EJECUTAMOS LA ORDEN DE INSERTAR
	$resultado = $sentencia->execute([$direccion_cliente, $id]);

	if ($resultado == true) {

		header("Location: cliente_direccion.php?good=true&id=$id");
	}else{
		header("Location: cliente_direccion.php?error=true&id=$id");
	}
 ?>