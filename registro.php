<?php 
  include 'cabecera.php';
 ?>

<!DOCTYPE html>
<html lang="en">
  <title>Registro</title>
<!-- FINALIZA EL ENCABEZADO DE LA PAGINA -->
<div class="container login-container ">
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
          <b>Teléfono</b><input type="text" id="telefono" class="form-control" placeholder="555555555" value="" name="telefono" required/>
        </div>
        <p id="error_telefono"class="text-danger"></p>
        
        <!-- DIRECCIÓN -->
        <div class="form-group">
          <b>Dirección</b><input type="text" id="direccion" class="form-control" placeholder="C/ La Castaña Nº25 P 2 5ºB" value="" name="direccion" required/>
        </div>
        <p id="error_direccion"></p>
        
        <!-- CONTRASEÑA -->
        <div class="form-group">
          <label for="password"><b>Contraseña</b></label>
          <input type="password" id="password" class="form-control" placeholder="*********" value="" name="contrasena" required/>
        </div>
        <p id="error_contrasena"class="text-danger"></p>
        
        <input type="hidden" name="oculto" value="1">
        <div class="form-group">
          <input type="submit" class="btnSubmit" value="Crear Usuario" />
        </div>
      </form>
    </div>
  </div>
</div>


<footer class="container-fluid text-center">
  <p>WEB CREADA POR: ALEJANDRO MARTÍNEZ PEINADO</p>
</footer>
<script type="text/javascript" src="cliente_nuevo.js"></script>
</body>
</html>