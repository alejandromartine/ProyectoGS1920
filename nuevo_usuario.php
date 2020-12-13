<?php  
	session_start();
	include 'cabecera_logued.php';
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}else{
		
	}
?>
<body>
	<div class="container login-container">
	<ul class="breadcrumb">
    	<li class="breadcrumb-item"><a href="index.php">Index</a></li>
    	<li class="breadcrumb-item active">Añadir empleado</li>
  	</ul>
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
<?php include 'footer.php' ?>