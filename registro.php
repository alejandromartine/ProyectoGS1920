<?php 
  include 'cabecera.php';
  //GENERAMOS EL VALOR DEL CAPTCHAR
  $n1 = rand(1,30);
  $n2 = rand(1,30);
  $n3 = rand(1,30);
  $n4 = rand(1,30);
  $n5 = rand(1,30);
  $n6 = rand(1,30);
  $n7 = rand(1,30);
  //GUARDAMOS EL VALOR Y LO MULTIPLICAMOS POR OTRO NUMERO ALEATORIO
  $valorCaptcha = $n1.$n2.$n3.$n4.$n5.$n6.$n7 * rand(50,500);
 ?>

<!-- FINALIZA EL ENCABEZADO DE LA PAGINA -->
<div class="container login-container ">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
      <li class="breadcrumb-item"><a href="login_usuarios.php">Login</a></li>
      <li class="breadcrumb-item active">Registro</li>
    </ul>

  <div class="row">
    <div id="login" class="col-md-12 login-form-1">
      <h3>REGISTRARSE</h3>
      <form method="POST" action="registro_proceso.php" id="formulario">
        <div class="form-group">
          <!-- EMAIL -->
          <label for="email"><b>Email</b></label> 
          <input type="email" class="form-control" placeholder="e895432@gmail.com" value=""  name="email" id="email" required />
        </div>
        <p id="error_email" class="text-danger"></p>
        <!-- NOMBRE -->
        <div class="form-group">
          <label for="nombre"><b>Nombre</b></label>
          <input type="text" id="nombre" class="form-control" placeholder="nombre" value="" name="nombre" required/>
        </div>
        <p id="error_nombre" class="text-danger"></p>

        <!-- APELLIDOS -->
        <div class="form-group">
          <b>Apellidos</b><input type="text" id="apellidos" class="form-control" placeholder="apellidos" value="" name="apellidos" required/>
        </div>
        <p id="error_apellidos"class="text-danger"></p>
        <!-- TELEFONO -->
        <div class="form-group">
          <label><b>Teléfono</b></label>
          <input type="text" id="telefono" class="form-control" placeholder="555555555" value="" name="telefono" maxlength="9"  required/>
        </div>
        <p id="error_telefono"class="text-danger"></p>
        
        <!-- DIRECCIÓN -->
        <div class="form-group">
          <label><b>Dirección</b></label>
          <input type="text" id="direccion" class="form-control" placeholder="C/ La Castaña Nº25 P 2 5ºB" value="" name="direccion" required/>
        </div>
        <p id="error_direccion"></p>
        
        <!-- CONTRASEÑA -->
        <div class="form-group">
          <label for="password"><b>Contraseña</b></label>
          <input type="password" id="password" class="form-control" placeholder="*********" value="" name="contrasena" required/>
        </div>
        <p id="error_contrasena"class="text-danger"></p>
        <!-- CAPTCHAR -->
        <div class="form-group">
          <label for="captchar"><b>CAPTCHAR</b></label>
          <input class="text-primary" name="captcha" id="captcha" disabled 
          value="<?php echo($valorCaptcha)?>"></input>
          <br>
          <label for="captcha_respuesta">Introduzca el texto del captchar</label>
          <br>
          <input type="text" id="captcha_respuesta" name="captcha_respuesta" required>
        </div>
        <p id="error_captchar"class="text-danger"></p>

        <input type="hidden" name="oculto" value="1">
        <div class="form-group">
          <input type="submit" class="btnSubmit" value="Crear Usuario" />
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="cliente_nuevo.js"></script>

<?php include 'footer.php'; ?>