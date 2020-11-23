<?php 
  include 'cabecera.php'; 
  include'conexion.php';
  include'carrito.php';
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

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
