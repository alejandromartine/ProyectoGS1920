<?php  
	session_start();
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}else{
		
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="ESTILO.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container login-container">
	  <div class="row">
	    <div id="login" class="col-md-12 login-form-1">
	      <h3>Añadir Usuario Administrador</h3>
	      <br>
	      <br>
	      <form method="POST" action="create.php">
	        <div class="form-group">
	        	<input type="password" class="form-control" placeholder="CONTRASEÑA" value="" name="contraseña" required />
	        </div>
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="NOMBRE" value="" name="nombre" required/>
	        </div>
	        <div class="form-group">
	         <input type="text" class="form-control" placeholder="APELLIDOS" value="" name="apellidos" />
	        </div>
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="EMAIL" value="" name="email"  required />
	        </div>
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="EDAD EN NÚMEROS " value="" name="edad"  required />
	        </div>
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="CIUDAD DE RESIDENCIA" value="" name="ciudad" required/>
	        </div>
	        <input type="hidden" name="oculto" value="1">
	        <div class="form-group">
	         <input type="submit" class="btnSubmit" value="Añadir usuario" />
	        </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
</body>
</html>