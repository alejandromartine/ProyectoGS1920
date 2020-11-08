<?php
//DEFINIMOS LOS DATOS DE MYSQL
$servername	="localhost";
$database	="mi_tienda";
$username	="root";
$password	="Alex99";

//CREAMOS LA CONEXION CON LA BASE DE DATOS
try{
	$bd = new PDO(
				'mysql:host=localhost;
				dbname='.$database, $username, $password,
				//ESTA LINEA PERMITE QUE SE MUESTREN LOS CARACTERES ESPECIALES DEL CASTELLANO
				array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//SI LA CONEXION CON BD DA UN ERROR MUESTRA UN MENSAJE DE ERROR POR PANTALLA
}catch(Exception $e){
	echo "Error de conexión".$e->getMessage();
}

?>