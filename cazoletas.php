<?php 
  include 'cabecera.php'; 
  include'conexion.php';
  include'carrito.php';
?>
<!-- CARRUSEL -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/imagenes/carrousel 1.jpg" alt="imagen promocional" width="650" height="350">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="assets/imagenes/carrousel 2.jpg" alt="Kaya shisha" width="650" height="350">
      <div class="carousel-caption">
        <h3>KAYA</h3>
        <p>Una de nuestras marcas mas vendidas</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="assets/imagenes/carrousel 3.jpg" alt="Cazoletas" width="650" height="350">
      <div class="carousel-caption">
        <h3>CAZOLETAS</h3>
        <p>Nuestros tipos de cazoletas</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="container">
    <br>
    <div class="titulos">
    <!-- APARTADO CACHIMBAS -->
    <h1 class="display-1 font-weigth-bold text-center mb-5"><b>CACHIMBAS</b></h1>
    </div>
    <div class="row ">
        <?php 
            $sentencia = $bd->prepare("SELECT id, nombre_producto, desc_producto, imagen_producto, precio_producto FROM lista_productos WHERE tipo_producto = 1");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
         ?>

        <?php foreach($listaProductos as $producto) { ?>


      <div class="col">
        <div class="card">
          <img 
          height="250px"
          class="card-img-top"
          title="<?php echo $producto['nombre_producto'];?>"  
          alt="<?php echo $producto['nombre_producto'];?>" 
          src="data:image/jpg;base64,<?php echo base64_encode($producto['imagen_producto']);?>">
          <div class="card-body">
            <span><?php echo $producto['nombre_producto'];?></span>
            <h5 class="card-title"><?php echo $producto['precio_producto'];?>€</h5>
                <p class="card-text"><?php echo $producto['desc_producto'];?></p>

            <form action="" method="post">
                <input hidden="" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                <input hidden="" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

            <button 
            class="btn ml-auto mr-auto"
            name="btnAccion"
            value="Añadir"
            type="submit"><i style="font-size:24px" class="fa">&#xf07a;</i></button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- APARTADO CAZOLETAS -->
     <div class="titulos">
    <h1 class="display-1 font-weigth-bold text-center mb-5"><b>CAZOLETAS</b></h1>
    </div>
    <div class="row ">
        <?php 
            $sentencia = $bd->prepare("SELECT id, nombre_producto, desc_producto, imagen_producto, precio_producto FROM lista_productos WHERE tipo_producto = 2");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
         ?>

        <?php foreach($listaProductos as $producto) { ?>


      <div class="col">
        <div class="card">
          <img 
          height="250px"
          class="card-img-top"
          title="<?php echo $producto['nombre_producto'];?>"  
          alt="<?php echo $producto['nombre_producto'];?>" 
          src="data:image/jpg;base64,<?php echo base64_encode($producto['imagen_producto']);?>">
          <div class="card-body">
            <span><?php echo $producto['nombre_producto'];?></span>
            <h5 class="card-title"><?php echo $producto['precio_producto'];?>€</h5>
                <p class="card-text"><?php echo $producto['desc_producto'];?></p>

            <form action="" method="post">
                <input hidden="" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                <input hidden="" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

            <button 
            class="btn ml-auto mr-auto"
            name="btnAccion"
            value="Añadir"
            type="submit"><i style="font-size:24px" class="fa">&#xf07a;</i></button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
      <!-- APARTADO ACCESORIOS -->
     <div class="titulos">
    <h1 class="display-1 font-weigth-bold text-center mb-5"><b>ACCESORIOS</b></h1>
    </div>
    <div class="row ">
        <?php 
            $sentencia = $bd->prepare("SELECT id, nombre_producto, desc_producto, imagen_producto, precio_producto FROM lista_productos WHERE tipo_producto = 3");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
         ?>

        <?php foreach($listaProductos as $producto) { ?>


      <div class="col">
        <div class="card">
          <img 
          height="250px"
          class="card-img-top"
          title="<?php echo $producto['nombre_producto'];?>"  
          alt="<?php echo $producto['nombre_producto'];?>" 
          src="data:image/;base64,<?php echo base64_encode($producto['imagen_producto']);?>">
          <div class="card-body">
            <span><?php echo $producto['nombre_producto'];?></span>
            <h5 class="card-title"><?php echo $producto['precio_producto'];?>€</h5>
                <p class="card-text"><?php echo $producto['desc_producto'];?></p>

            <form action="" method="post">
                <input hidden="" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                <input hidden="" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

            <button 
            class="btn ml-auto mr-auto"
            name="btnAccion"
            value="Añadir"
            type="submit"><i style="font-size:24px" class="fa">&#xf07a;</i></button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

</div>
