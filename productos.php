<?php
    include'conexion.php';
    include'carrito.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VALHALLA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="ESTILO.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-ligth bg-ligth fixed-top">
    <a href="navbar-brand">Logo</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item active">
                <a href="mostrarCarrito.php" class="nav-link">carrito(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); ?>)</a>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<div class="container">
    <br>
    <div class="alert alert-success">
        <a href="mostrarCarrito.php" class="badge">Ver varrito</a>
    </div>
    <div class="row ">
        <?php 
            $sentencia = $bd->prepare("SELECT id, nombre_producto, desc_producto, imagen_producto, precio_producto FROM lista_productos ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
         ?>

        <?php foreach($listaProductos as $producto) { ?>


      <div class="col-3">
        <div class="card">
          <img 
          height="250px"
          class="card-img-top"
          title="<?php echo $producto['nombre_producto'];?>"  
          alt="<?php echo $producto['nombre_producto'];?>" 
          src="<?php echo $producto['imagen_producto'];?>">
          <div class="card-body">
            <span><?php echo $producto['nombre_producto'];?></span>
            <h5 class="card-title"><?php echo $producto['precio_producto'];?></h5>
            <p class="card-text"><?php echo $producto['desc_producto'];?></p>
            
            <form action="" method="post">
                <input hidden="" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                <input hidden="" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

            <button 
            class="btn btn-primary"
            name="btnAccion"
            value="Añadir"
            type="submit">Añadir al carrito</button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

</div>


<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contacte con nosotros y le responderemos en menos de 24 horas.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Melilla, ESP</p>
      <p><span class="glyphicon glyphicon-phone"></span> 952952952</p>
      <p><span class="glyphicon glyphicon-envelope"></span> info@lilhooka.es</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comentarios" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>WEB CREADA POR: ALEJANDRO MARTÍNEZ PEINADO</p>
</footer>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
</body>
</html>
