<?php 
session_start();
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}else{
		
	}

	require 'cabecera_logued.php';
 ?>


<div class="container login-container ">
  <div class="row">
    <div id="login" class="col-md-12 login-form-1">
      <h3>AÑADIR PRODUCTO</h3>
      <form method="POST" action="add_products_proceso.php" enctype="multipart/form-data">
        <div class="form-group">
          <!-- NOMBRE PRODUCTO -->
          <label for="nombre"><b>Nombre</b></label> 
          <input type="text" class="form-control" placeholder="Blue Dragon" value=""  name="nombre" id="nombre" required />
        </div>
       
        <!-- CODIGO -->
        <div class="form-group">
          <label for="codigo"><b>Codigo</b></label>
          <input type="text" id="codigo" class="form-control" placeholder="codigo" value="" name="code" required/>
        </div>
        <p id="error_codigo" class="text-danger"></p>

        <!-- PRECIO -->
        <div class="form-group">
          <label for="precio"><b>Precio</b></label>
          <input type="text" id="precio" class="form-control" placeholder="precio en €" value="" name="precio" required/>
        </div>
        <p id="error_apellidos"class="text-danger"></p>
        <!-- DESCRIPCIÓN -->
        <div class="form-group">
          <label for="desc"><b>Descripción del producto</b></label>
          <textarea class="form-control" rows="5" id="comment" name="desc"></textarea>
        </div>
        <p id="error_desc"class="text-danger"></p>
        
        <!-- TIPO -->
        <div class="form-check-inline">
         <label class="form-check-label">
         	<input type="radio" class="form-check-input" name="tipo" value="1"> <b>CACHIMBA</b>
         </label>
        </div>
        <div class="form-check-inline">
        	<label class="form-check-label">
        		<input class="form-check-input" type="radio" name="tipo" value="2"><b>CAZOLETA</b>
        	</label>
        </div>
        <div class="form-check-inline">
        	<label class="form-check-label">
        		<input class="form-check-input" type="radio" name="tipo" value="3"><b>ACCESORIOS</b>
        	</label>
        </div>
        
        <!-- IMAGEN -->
        <div class="custom-file mb-3">
        	<input type="file" id="customFile" class="custom-file-input" name="img">
        	<label class="custom-file-label" for="customFile"></label>
          
        </div>
        <p id="error_contrasena"class="text-danger"></p>
        
        <input type="hidden" name="oculto" value="1">
        <div class="form-group">
          <input type="submit" class="btnSubmit" value="Añadir Producto" />
        </div>
      </form>
    </div>
    <script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
  		var fileName = $(this).val().split("\\").pop();
  		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
  </div>
</div>