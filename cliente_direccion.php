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

	<div class="container login-container">
		<ul class="breadcrumb">
    		<li class="breadcrumb-item"><a href="index_clientes.php">Inicio</a></li>
    		<li class="breadcrumb-item active">Cambio dirección</li>
  		</ul>
		<div class="row">
			<div class="col-md-12 login-form-1">
				<h3>Cambie su dirección</h3>
				<form method="POST" action="editar_direccion_user.php">
					<div class="form-group">	
						<label><b>Nueva dirección</b></label>
						<input type="text" class="form-control"name="direccion_nueva"value="" required>
					</div>

					<div class="form-group">
						<input type="hidden" class="form-control" name="oculto" value=" <?php echo $cliente->password; ?>">
						<input type="hidden" class="form-control" name="id2" value=" <?php echo $cliente->id_cliente; ?>">
						<p colspan="2"><a href="index_clientes"><i style='font-size:24px' class='fas'>&#xf060;</i> Volver</a> <input type="submit" class="btn btn-success" value="Editar dirección">
							<?php if(isset($_GET['good']) && $_GET['good'] == 'true'): ?>
		        			<center><h2 class="text-primary">¡Su dirección se ha modificado con exito!</h2></center>
		       				<?php endif; ?>
		       				<?php if(isset($_GET['error']) && $_GET['error'] == 'true'): ?>
		        			<center><h2 class="text-primary">¡Su dirección no se ha modificado, ha ocurrido un error!</h2></center>
		       				<?php endif; ?>
						</div>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>