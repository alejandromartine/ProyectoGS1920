<?php  
	session_start();
	require 'cabecera_logued.php';

	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}
	//ESTAS LINEAS IMPIDEN QUE LAS PERSONAS NO LOGEADAS PUEDAN ACCEDER
	if (!isset($_SESSION['email'])) {
		header('Location: login_usuarios.php');
	}elseif ($_SESSION['email']) {
		require 'conexion.php';

		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM lista_productos WHERE id =?");
		$resultado = $sentencia->execute([$id]);
		$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
	}else{
		echo "ERROR";
	}

?>


	<div class="container login-container ">
  <div class="row">
    <div id="login" class="col-md-12 login-form-1">
      <h3>EDITAR PRODUCTO</h3>
      <form method="POST" action="editar_producto_proceso.php" enctype="multipart/form-data">
        <div class="form-group">
          <!-- NOMBRE PRODUCTO -->
          <label for="nombre"><b>Nombre</b></label> 
          <input type="text" class="form-control" placeholder="Blue Dragon" value="<?php echo $usuario->nombre_producto?>"  name="nombre" id="nombre" required />
        </div>
       
        <!-- CODIGO -->
        <div class="form-group">
          <label for="codigo"><b>Codigo</b></label>
          <input type="text" id="codigo" class="form-control" placeholder="codigo" value="<?php echo $usuario->code_producto ?>" name="code" required/>
        </div>
        <p id="error_codigo" class="text-danger"></p>

        <!-- PRECIO -->
        <div class="form-group">
          <label for="precio"><b>Precio</b></label>
          <input type="text" id="precio" class="form-control" placeholder="precio en €" value="<?php echo $usuario->precio_producto?>" name="precio" required/>
        </div>
        <p id="error_apellidos"class="text-danger"></p>
        <!-- DESCRIPCIÓN -->
        <div class="form-group">
          <label for="desc"><b>Descripción del producto</b></label>
          <p><b>Esta es la descripción actual del producto: </b></p>
          <p><?php echo $usuario->desc_producto ?></p>
          <textarea class="form-control" rows="5" id="comment" name="desc" placeholder="Escriba aqui la nueva descripción, en caso de querer mantener la antigua copie y pege el texto que aparece arriba."></textarea>
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
        
        
        <input type="hidden" name="oculto" value="1">
        <div class="form-group">
        	<input type="hidden" name="id2" value=" <?php echo $usuario->id; ?>">
        	<input type="submit" class="btnSubmit" value="Editar Producto" />
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