<?php  
	session_start();

	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}elseif ($_SESSION['email']) {
		require 'conexion.php';

		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id =?");
		$resultado = $sentencia->execute([$id]);
		$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
	}else{
		echo "ERROR";
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuario</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Usuario</h3>
		<form method="POST" action="editarproceso.php">
			<table>
				<tr>
					<td>Contraseña: </td>
					<td><input type="text" name="contraseña" value="<?php echo $usuario->contrasena ?>"></td>
				</tr>
				<tr>	
					<td>Nombre: </td>
					<td><input type="text" name="nombre"value="<?php echo $usuario->nombre ?>"></td>
				</tr>
				<tr>	
					<td>Apellidos: </td>	
					<td><input type="text" name="apellidos"value="<?php echo $usuario->apellidos ?>"></td>
				</tr>
				<tr>	
					<td>Email: </td>
					<td><input type="text" name="email"value="<?php echo $usuario->email ?>"></td>
				</tr>
				<tr>	
					<td>Edad: </td>
					<td><input type="text" name="edad"value="<?php echo $usuario->edad ?>"></td>
				</tr>	
				<tr>
					<td>Ciudad: </td>
					<td><input type="text" name="ciudad"value="<?php echo $usuario->ciudad ?>"></td>
				</tr>
			
				<tr>
					<td><input type="hidden" name="oculto"></td>
					<input type="hidden" name="id2" value=" <?php echo $usuario->id; ?>">
					<td colspan="2"><input type="submit" value="Editar usuario"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>