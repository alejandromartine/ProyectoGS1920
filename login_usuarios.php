<?php 
	session_start();


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- BOOSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- ICONOS DE FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ICONOS DE GOOGLE-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CARROUSEL RESPONSIVE -->
    <link rel="stylesheet" type="text/css" href="css/carrusel.css">
    <!-- UNDERLINE DE LOS TEXTOS PRINCIPALES -->
    <link rel="stylesheet" type="text/css" href="css/underline.css">


</head>
<body>
	<div class="container login-container ">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                <li class="breadcrumb-item active">Login</li>
            </ul>
		<div class="row">
			<div class="col-sm-4 mb-6"></div>
			<div id="login" class="col-sm-4 login-form-1 ">
				<div class="panel panel-primary text-center" style="margin-top: 20px">
					<div class="panel panel-heading text-center display-4 bg-dark text-white">Login</div>
					<div class="bg-dark">
						<a href="inicio.php">
							<img src="assets/imagenes/logo3.png" class="img-fluid" alt="LOGO">
						</a>
					</div>
					<div class="panel panel-body text-center">
						<form method="POST" action="loginProceso.php">
						    <div class="form-group">
						    	<label><b>Usuario</b></label>
					        	<input type="text" class="form-control" placeholder="Email " value="" name="email" alt="email" id="email" required />
					        </div>
					        <div class="form-group">
					        	<label><b>Contraseña</b></label>
					        	<input type="password" class="form-control" placeholder="Contraseña" value="" name="contrasena" alt="contrasena" id="contrasena" required/>
					        </div>
					        <!-- SE MUESTRA EL ERRO AL INICIAR SESION -->
					        <div align="mensaje">
                				<?php if(isset($_GET['error']) && $_GET['error'] == 'true'): ?>
                   			 		<center><h2 class="text-danger">¡Sus datos no son correctos!</h2></center>
                				<?php endif; ?>
            				</div>
            				
					        <div class="form-group">
					        	<input type="submit" class="btnSubmit" value="Iniciar Sesion" alt="Iniciar sesion" id="iniciarSesion" />
					        </div>
					        <div class="form-group">
					        	<a href="registro.php" id="registrarNuevo"> Crear una cuenta nueva </a>
					        </div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
