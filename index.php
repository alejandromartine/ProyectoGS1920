<?php 

	session_start();
	include 'cabecera_logued.php';
	include 'conexion.php';
	$email = $_SESSION['email'];
	//CONSULTAMOS SI EL DATO INTRODUCIDO POR EL LOGIN ESTA EN LA BASE DE DATOS USUARIOS
	$requisito = $bd->query("SELECT email FROM usuarios WHERE email = '$email'");
	//RECOGEMOS EL DATO APORTADO POR LA CONSULTA EN CASO DE NO EXISTIR SERIA VACIO
	$r_entrada = $requisito->fetch(PDO::FETCH_ASSOC);
	//CONVERTIMOS EL DATO QUE APARECE EN UN ARRAY EN STRING
	$string = implode($r_entrada);


	//SI EL STRING RECIBIDO COINCIDE CON EL EMAIL APORTADO SE INICIA SESION EN EL INDEX DE ADMINISTRACIÓN, EN CASO DE SER UN USUARIO SE LE REDIRIGE AL INDEX CLIENTES, SI NO ESTA EN NINGUNA DE LAS DOS EN EL APARTADO LOGIN USUARIOS SE LE INDICA QUE NO EXISTE EL USUARIO.
	if ($string===$email) {
		$usuarios = $bd->query("SELECT * FROM usuarios;");
		$resultado = $usuarios-> fetchAll(PDO::FETCH_OBJ);
	}else {
		header('Location: index_clientes.php');
	}


?>



	<div class="container-fluid mt-3">
		<h1>Bienvenido: <?php echo$_SESSION['nombre']; ?> <?php echo$_SESSION['apellidos']; ?> </h1>
		<h3>LISTADO DE USUARIOS</h3>
			<div class="table-responsive-sm">
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>CONTRASEÑA</th>
							<th>NOMBRE</th>
							<th>APELLIDOS</th>
							<th>EMAIL</th>
							<th>EDAD</th>
							<th>CIUDAD</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php  
						foreach ($resultado as $dato){
						 ?>
						<tr>
							<td><?php echo $dato->id; ?></td>
							<td><?php echo $dato->contrasena; ?></td>
							<td><?php echo $dato->nombre; ?></td>
							<td><?php echo $dato->apellidos; ?></td>
							<td><?php echo $dato->email; ?></td>
							<td><?php echo $dato->edad; ?></td>
							<td><?php echo $dato->ciudad; ?></td>
							<td><a href="editar.php?id=<?php echo $dato->id; ?>"><i class="material-icons">&#xe254;</i></a></td>
							<td><a href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="material-icons" style="color: red">&#xe92b;</i></a></td>
						</tr>
							<?php } ?>
		 			</tbody>
				</table>
			</div>
		</center>	
	</div>
<?php include 'footer.php'; ?>