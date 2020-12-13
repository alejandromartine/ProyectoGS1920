<?php 
	include 'cabecera_clientes.php';

	session_start();
	$email = $_SESSION['email'];
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}elseif ($_SESSION['email']) {
		include 'conexion.php';
		$usuarios = $bd->query("SELECT * FROM clientes WHERE email_cliente = '$email'");
		$resultado = $usuarios->fetchAll(PDO::FETCH_OBJ);
	}else{
		echo "ERROR";
	}
					
?>	

<div class="container-fluid">
	<ul class="breadcrumb">
    	<li class="breadcrumb-item"><a href="index_clientes.php">Index</a></li>
    	<li class="breadcrumb-item active">Mis_datos</li>
    </ul>
	<h1>Bienvenido: </h1>
	<div class="table-responsive-sm">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>APELLIDOS</th>
					<th>EMAIL</th>
					<th>direccion</th>
					<th>telefono</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($resultado as $dato) {
					# code...
				} ?>
				<tr>
					<td><?php echo $dato->id_cliente; ?></td>
					<td><?php echo $dato->nombre_cliente; ?></td>
					<td><?php echo $dato->apellidos; ?></td>
					<td><?php echo $dato->email_cliente; ?></td>
					<td><?php echo $dato->direccion_cliente; ?></td>
					<td><?php echo $dato->telefono_cliente; ?></td>
				</tr>
		 	</tbody>
		</table>		
	</div>
	<colspan="2"><a href="index_clientes"><i style='font-size:24px' class='fas'>&#xf060;</i> Volver</a>
</div>

<?php include 'footer.php'; ?>