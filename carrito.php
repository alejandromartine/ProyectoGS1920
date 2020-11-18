<?php 
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

	switch($_POST['btnAccion']){
		case 'Añadir':

			if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
				$Id=openssl_decrypt($_POST['id'], COD, KEY);
				$mensaje.="Id correcto". $Id;
			}else{
				$mensaje.="El id es incorrecto";
			}

			if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
				$Nombre=openssl_decrypt($_POST['nombre'], COD, KEY);
				$mensaje.="Nombre correcto". $Nombre;
			}else{
				$mensaje.="El nombre es incorrecto";
			break;} 

			if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
				$Precio=openssl_decrypt($_POST['precio'], COD, KEY);
				$mensaje.="precio correcto". $Precio;
			}else{
				$mensaje.="El precio es incorrecto";
			break;} 

			if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
				$Cantidad=openssl_decrypt($_POST['cantidad'], COD, KEY);
				$mensaje.="Cantidad correcta ". $Cantidad;
			}else{
				$mensaje.="La cantidad es incorrecta";
			break;} 

			if (!isset($_SESSION['CARRITO'])) {
				$producto=array(
					'Id'=>$Id,
					'Nombre'=>$Nombre,
					'Precio'=>$Precio,
					'Cantidad'=>$Cantidad
				);
				$_SESSION['CARRITO'][0]=$producto;
			}else{
				$idProductos = array_column($_SESSION['CARRITO'], "Id");

				if (in_array($Id, $idProductos)) {
					
				}else{
				$NumeroProductos=count($_SESSION['CARRITO']);
				$producto=array(
					'Id'=>$Id,
					'Nombre'=>$Nombre,
					'Precio'=>$Precio,
					'Cantidad'=>$Cantidad
				);
				$_SESSION['CARRITO'][$NumeroProductos]=$producto;}
			}
			$mensaje = ("Producto agregado con exito");

		break;


		case 'eliminar':
			if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
				$Id=openssl_decrypt($_POST['id'], COD, KEY);
				
				foreach ($_SESSION['CARRITO'] as $indice => $producto) {
					if ($producto['Id'] == $Id) {
						unset($_SESSION['CARRITO'][$indice]);
					}
				}
			}else{
				$mensaje.="El id es incorrecto";
			}
			break;
	}
}








 ?>