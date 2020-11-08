<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>
</head>
<body>
	<?php 
		include 'conexion.php';
		$usuarios = $bd->query("SELECT * FROM usuarios;");
		$resultado = $usuarios-> fetchAll(PDO::FETCH_OBJ);
		//print_r($resultado);
	?>
	<div>
		<center>
			<h3>LISTADO DE USUARIOS</h3>
			<table>
				<thead>
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
				<tbody>
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
						<td><a href="editar.php?id=<?php echo $dato->id; ?>">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id; ?>">Eliminar</a></td>
					</tr>
						<?php } ?>
	 			</tbody>
			</table>
			<!-- APARTADO DE CREAR -->
			<hr>
			<h3>INSERTAR DATOS</h3>
			<form method="POST" action="create.php">
				<table>
					<tr>
						<td>Contraseña: </td>
						<td><input type="text" name="contraseña"></td>
					</tr>
					<tr>	
						<td>Nombre: </td>
						<td><input type="text" name="nombre"></td>
					</tr>
					<tr>	
						<td>Apellidos: </td>	
						<td><input type="text" name="apellidos"></td>
					</tr>
					<tr>	
						<td>Email: </td>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>	
						<td>Edad: </td>
						<td><input type="text" name="edad"></td>
					</tr>	
					<tr>
						<td>Ciudad: </td>
						<td><input type="text" name="ciudad"></td>
					</tr>
					<input type="hidden" name="oculto" value="1">
					<tr>
						<td><input type="reset" name=""></td>
						<td><input type="submit" value="Añadir usuario"></td>
					</tr>
				</table>
			</form>
			<!-- APARTADO DE CREAR FIN -->
		</center>	
	</div>

</body>
</html>