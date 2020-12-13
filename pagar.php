<?php 
	include'conexion.php';
  include'carrito.php';
  include 'cabecera.php';

 ?>


 <?php 
 	
 	if ($_POST) {
 		$total = 0;
 		$sid= session_id();
 		$correo = $_POST['email'];
 		foreach ($_SESSION['CARRITO'] as $indice => $producto) {
 			$total = $total+($producto['Cantidad'] * $producto['Precio']);
 		} 

  //SE REGISTRAN LOS DATOS DE LA VENTA
 		$sentencia = $bd->prepare("INSERT INTO `ventas` (`id_venta`, `claveTransaccion`, `datosPaypal`, `fecha`, `email`, `total`, `estado`) VALUES (NULL, :claveTransaccion, '', NOW(), :email, :total, 'pendiente');)");
 		//SE INSERTAN LOS DATOS AUTOMATICAMENTE DE LOS PRODUCTOS SELECCIONADOS
 		$sentencia->bindParam(":claveTransaccion", $sid);
 		$sentencia->bindParam(":email", $correo);
 		$sentencia->bindParam(":total", $total);
 		$sentencia->execute();

  //SE REGISTRAN LOS DETALLES DE LA VENTA 
 		$idVenta = $bd->lastInsertId();
 		foreach ($_SESSION['CARRITO'] as $indice => $producto) {
 			$sentencia = $bd->prepare("INSERT INTO `detalleventa` (`id_detalle`, `id_venta`, `id`, `preciounitario`, `cantidad`, `descargado`) VALUES (NULL, :id_venta, :id, :preciounitario, :cantidad, '0');");
 			//SE INSERTAN LOS DATOS AUTOMATICAMENTE DE LOS PRODUCTOS SELECCIONADOS
 			$sentencia->bindParam(":id_venta", $idVenta);
 			$sentencia->bindParam(":id", $producto['Id']);
 			$sentencia->bindParam(":preciounitario", $producto['Precio']);
 			$sentencia->bindParam(":cantidad", $producto['Cantidad']);
 			$sentencia->execute();
 		}	

 		
 	}
  ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
     <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>

    <div class="jumbotron text-center">
  		<h1 class="display-4">¡Utimo Paso!</h1>
  		<hr class="my-4">
  		<p class="lead">Estas a punto de pagar con Paypal la cantidad de:
  			<h4>€<?php echo number_format($total ,2); ?></h4>
        	<div class="ml-auto mr-auto" id="paypal-button-container"></div>
  		</p>
  			<p>El detalle de venta podra ser descargado una vez se haga el pago
  				<strong>PARA ACLARACIONES: a6310774@gmail.com</strong>
  			</p>
    </div>


    <script>
        // Render the PayPal button into #paypal-button-container

      paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
          sandbox: 'AYz1GfAWvPF5fN_A901XIw31a6etyTia09swJsGX3Y2FElXsghM0iNJArO7JgC6GHKpa85KUS4vgZIOE',
          production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
          label: 'checkout',
          size: 'responsive',
          color: 'gold',
          shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
          return actions.payment.create({
            payment: {  
              transactions: [{
                amount: {
                  total: '<?php echo($total) ?>',
                  currency: 'EUR'
                },
                description:"Compra de productos a VALHALLA:€<?php echo number_format($total ,2); ?>",
                custom: "<?php echo $sid;?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"
              }]
            }  
          });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            console.log(data);
            window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
          });
        }
      }, '#paypal-button-container');
    </script>

<?php include 'footer.php'; ?>

