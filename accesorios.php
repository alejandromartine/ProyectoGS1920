<?php 
  include 'cabecera.php'; 
  include'conexion.php';
  include'carrito.php';
?>


<div class="container">
    <br>
    <div class="titulos">
      <!-- APARTADO ACCESORIOS -->
     <div class="titulos">
    <h1 class="display-1 font-weigth-bold text-center mb-5"><b>ACCESORIOS</b></h1>
    </div>
    <div class="row">
        <?php 
            $sentencia = $bd->prepare("SELECT id, nombre_producto, desc_producto, imagen_producto, precio_producto FROM lista_productos WHERE tipo_producto = 3");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
         ?>

        <?php foreach($listaProductos as $producto) { ?>


      <div class="col-2-md col-2 mb-5">

          <img 
          height="250px"
          class="card-img-top"
          title="<?php echo $producto['nombre_producto'];?>"  
          alt="<?php echo $producto['nombre_producto'];?>" 
          src="data:image/;base64,<?php echo base64_encode($producto['imagen_producto']);?>">
      </div>
      <div class="col-3-md col-4 mb-5 ">
        <span><?php echo $producto['nombre_producto'];?></span>
            <h5 class="card-title"><?php echo $producto['precio_producto'];?>€</h5>
                <p class="card-text"><?php echo $producto['desc_producto'];?></p>

            <form action="" method="post">
                <input hidden="" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                <input hidden="" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'], COD, KEY);?>">
                <input hidden="" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

              <button class="btn ml-auto mr-auto mt-5" name="btnAccion" value="Añadir" type="submit"><i  style="font-size:24px" class="fa">&#xf07a;</i></button>
            </form>
      </div>
      <?php } ?>
    </div>

</div>
