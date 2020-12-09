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
		<form method="POST" action="editar_pass_user.php">
			<table>
				<tr>	
					<td><label>Contraseña actual: </label></td>
					<td><input type="text" name="contrasena"value="" required></td>
					<td>
						<div align="mensaje">
	      					<?php if(isset($_GET['error']) && $_GET['error'] == 'true'): ?>
	        				<center><h2 class="text-danger">¡Su contraseña no coincide!</h2></center>
	       					<?php endif; ?>
	      				</div>
      				</td>
				</tr>
	
				<tr>	
					<td><label>Nueva contraseña </label></td>
					<td><input type="text" name="contrasena_nueva"value="" required></td>
				</tr>
				<tr>
					<td><input type="hidden" name="oculto" value=" <?php echo $cliente->password; ?>"></td>
					<input type="hidden" name="id2" value=" <?php echo $cliente->id_cliente; ?>">
					<td colspan="2"><a href="index_clientes"><i style='font-size:24px' class='fas'>&#xf060;</i> Volver</a> <input type="submit" class="btnSubmit" value="Editar usuario"></td>
					<?php if(isset($_GET['good']) && $_GET['good'] == 'true'): ?>
        				<center><h2 class="text-primary">¡Su contraseña se ha cambiado con exito!</h2></center>
       				<?php endif; ?>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>