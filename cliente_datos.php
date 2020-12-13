<?php
	session_start();
	
	include  'cabecera_clientes.php';
	
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

	<div class="container login-container ">
		<ul class="breadcrumb">
    		<li class="breadcrumb-item"><a href="index_clientes.php">Inicio</a></li>
   			<li class="breadcrumb-item active">Cambio datos</li>
  		</ul>
		<div class="row">
			<div id="login" class="col-md-12 login-form-1">
				<h3>Editar Usuario</h3>
				<form method="POST" action="editar_datos_usuario.php">
					<div class="form-group">	
						<label for="nombre"><b>Nombre:</b></label>
						<input type="text" class="form-control"name="nombre"value="<?php echo $cliente->nombre_cliente ?>">
					</div>
					<p id="error_nombre" class="text-danger"></p>

					<div class="form-group">	
						<label for="apellidos"><b>Apellidos:</b></label>	
						<input type="text" class="form-control"name="apellidos"value="<?php echo $cliente->apellidos ?>">
					</div>
					<p id="error_apellidos"class="text-danger"></p>	

					<div class="form-group">	
						<label for="email"><b>Email:</b></label>
						<input type="text"class="form-control" name="email"value="<?php echo $cliente->email_cliente ?>">
					</div>
					<p id="error_email" class="text-danger"></p>

					<div class="form-group">	
						<label><b>Telefono: </b></label>
						<input type="text" class="form-control"name="telefono"value="<?php echo $cliente->telefono_cliente ?>">
					</div>
						<p id="error_telefono"class="text-danger"></p>

							<input type="hidden"class="form-control" name="oculto">
							<input type="hidden" class="form-control"name="id2" value=" <?php echo $cliente->id_cliente; ?>">
							 <div colspan="2"><a href="index_clientes"><i style='font-size:24px' class='fas'>&#xf060;</i> Volver</a> <input type="submit" class="btn btn-success" value="Editar"></div>
						
				</form>
			</div>
		</div>	
	</div>
	<script type="text/javascript" src="cliente_nuevo.js"></script>

<?php include 'footer.php'; ?>