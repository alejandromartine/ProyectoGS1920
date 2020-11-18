<?php 
	include'conexion.php';
    include'carrito.php';
    include 'templates/cabecera.php';
 ?>


 <?php 
 	
 	if ($_POST) {
 		$total = 0;
 		$sid= session_id();
 		$correo = $_POST['email'];
 		foreach ($_SESSION['CARRITO'] as $indice => $producto) {
 			$total = $total+($producto['Cantidad'] * $producto['Precio']);
 		} 
 		$sentencia = $bd->prepare("INSERT INTO `ventas` (`id_venta`, `claveTransaccion`, `datosPaypal`, `fecha`, `email`, `total`, `estado`) VALUES (NULL, :claveTransaccion, '', NOW(), :email, :total, 'pendiente');)");
 		//SE INSERTAN LOS DATOS AUTOMATICAMENTE DE LOS PRODUCTOS SELECCIONADOS
 		$sentencia->bindParam(":claveTransaccion", $sid);
 		$sentencia->bindParam(":email", $correo);
 		$sentencia->bindParam(":total", $total);
 		$sentencia->execute();

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


    <div class="jumbotron text-center">
  		<h1 class="display-4">¡Utimo Paso!</h1>
  		<hr class="my-4">
  		<p class="lead">Estas a punto de pagar con Paypal la cantidad de:
  			<h4>€<?php echo number_format($total ,2); ?></h4>
  			<div id="smart-button-container">
      			<div style="text-align: center;">
        			<div id="paypal-button-container"></div>
      			</div>
			</div>

  		</p>
  			<p>El de talle de venta podra ser descargado una vez se haga el pago
  				<strong>PARA ACLARACIONES: a6310774@gmail.com</strong>
  			</p>
    </div>

  <script
    src="https://www.paypal.com/sdk/js?client-id=AfyoVPIfNMyj5kpaLJCm-_NTl1yV52O9MUVZWfbu7OazH1FjT6qjeMyp30j8YXvkHbEvuthuR6t_HFfr"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
    <script src="https://www.paypal.com/sdk/js?client-id=AfyoVPIfNMyj5kpaLJCm-_NTl1yV52O9MUVZWfbu7OazH1FjT6qjeMyp30j8YXvkHbEvuthuR6t_HFfrsb&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"EUR","value":<?php $total; ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

  <script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: <?php $_POST['Cantidad']; ?>{
            value: '<?php $total; ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
</script>