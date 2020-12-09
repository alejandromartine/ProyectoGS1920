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

 
	foreach ($resultado as $dato){
					
?>
	

<div class="container">
  <p></p>
  <h2>Bienvenido: <?php echo$_SESSION['nombre']; ?> <?php echo$_SESSION['apellidos']; ?></h2>
  <p></p>
  <div class="card" >
    <div class="card-body">
      <h4 class="card-title">Aqui puedes controlar tu información personal.</h4>
      <p></p>
      <p> <a href="cliente_direccion.php?id=<?php echo $dato->id_cliente; ?>"><i class="fa fa-paper-plane" style="font-size:24px"> Mi dirección</i></a></p>

      <p> <a href="cliente_contrasena.php?id=<?php echo $dato->id_cliente; ?>"><i class="fa fa-paper-plane" style="font-size:24px"> Cambiar contraseña</i></a></p>
      

      <p> <a href="cliente_datos.php?id=<?php echo $dato->id_cliente; ?>"><i class="fa fa-paper-plane" style="font-size:24px"> Mis datos</i></a></p>

      <p> <a href="cliente_datos.php?id=<?php echo $dato->id_cliente; ?>"><i class="fa fa-paper-plane" style="font-size:24px"> Editar datos personales</i></a></p>
    </div>
    <?php } ?>
  </div>

</div>


</body>
</html>
