<?php 
	include'conexion.php';
    include'carrito.php';
    include 'cabecera.php';

 ?>

 <h3>LISTA DEL CARRITO</h3>
   <ul class="breadcrumb">
   	<li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
   	<li class="breadcrumb-item active">Carrito</li>
  </ul>
 <?php if (!empty($_SESSION['CARRITO'])) { ?>
 <table  class="table table-ligth table-border">
 	<tbody>
 		<tr>
 			<th width="40%">Descripción</th>
 			<th width="15%" class="text center">Cantidad</th>
 			<th width="20%" class="text center">Precio</th>
 			<th width="20%" class="text center">Total</th>
 			<th width="5%"  class="text center">--</th>
 		</tr>
 		<!-- SE INICIA EL CONTADOR DEL PRECIOTOTAL, SE MUESTRAN LOS DATOS DE LOS ARTICULOS SELECCIONADOS MEDIANTE UNA LLAMADA POR SESIONES AL PHP CARRITO -->
 	<?php $total=0; ?>
 	<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
 		<tr>
 			<td width="40%"><?php echo $producto['Nombre']; ?></td>
 			<td width="15%"	class="text center"><?php echo $producto['Cantidad']; ?></td>
 			<td width="20%"	class="text center"><?php echo $producto['Precio']; ?></td>
 			<td width="20%"	class="text center"><?php echo number_format($producto['Cantidad'] * $producto['Precio'],2); ?></td>
 			<td width="5%">
 				<form action="" method="post">
 					<input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['Id'], COD, KEY);  ?>">
 					<button class="btn btn-danger" type="submit" name="btnAccion" value="eliminar">Eliminar</button>
 				</form>
 			</td>
 		</tr>

 	<?php
 	//SE VA SUMANDA EL PRECIO DE CADA PRODUCTO 
 	$total = $total+($producto['Cantidad'] * $producto['Precio']); ?>
 	<?php } ?>
 		<tr>
 			<td colspan="3" align="rigth"><h3>Total</h3></td>
 			<td align="rigth"><h3>€<?php echo number_format($total,2);?></h3></td>
 			<td></td>
 		</tr>
 		<!-- Aqui se añade el correo para que recepcione el pedido -->
 		<tr>
 			<td colspan="5">
 			<form action="pagar.php" method="post">	
 				<div class="alert alert-success">			
					<div class="form-group">
 						<label for="my-input">Correo de contacto: </label>
 						<input type="email" name="email" id="email"
 						class="form-control" placeholder="Escriba su correo" required>
 					</div>
 					<small id="emailHelp" class="form-text text-muted">Los productos se enviaran a este correo</small>
 				</div>	
 				<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion"> Proceder a pagar</button>
 			</form>	
 			</td>
 		</tr>	
 	</tbody>
 <?php } else{ ?>
 	<div class="alert alert-success">
 		No hay productos en el carrito...
 	</div>
 <?php } ?>
 </table>

<?php include 'footer.php' ?>