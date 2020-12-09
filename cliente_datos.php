<?php
	include  'cabecera_clientes.php';
	session_start();

	if (!isset($_GET['id'])) {
		header('Location: index_clientes.php');
	}
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}elseif ($_SESSION['email']) {
		require 'conexion.php';

		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM clientes WHERE id_cliente =?");
		$resultado = $sentencia->execute([$id]);
		$cliente = $sentencia->fetch(PDO::FETCH_OBJ);
	}else{
		echo "ERROR";
	}

?>

	<center>
		<h3>Editar Usuario</h3>
		<form method="POST" action="editar_datos_usuario.php">
			<table>
				<tr>	
					<td>Nombre: </td>
					<td><input type="text" name="nombre"value="<?php echo $cliente->nombre_cliente ?>"></td>
				</tr>
				<tr>	
					<td>Apellidos: </td>	
					<td><input type="text" name="apellidos"value="<?php echo $cliente->apellidos ?>"></td>
				</tr>
				<tr>	
					<td>Email: </td>
					<td><input type="text" name="email"value="<?php echo $cliente->email_cliente ?>"></td>
				</tr>
				<tr>	
					<td><label>Telefono: </label> </td>
					<td><input type="text" name="telefono"value="<?php echo $cliente->telefono_cliente ?>"></td>
				</tr>	
				<tr>
				<tr>
					<td><input type="hidden" name="oculto"></td>
					<input type="hidden" name="id2" value=" <?php echo $cliente->id_cliente; ?>">
					<td colspan="2"><a href="index_clientes"><i style='font-size:24px' class='fas'>&#xf060;</i> Volver</a> <input type="submit" value="Editar"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>