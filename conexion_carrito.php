<?php
$db_username        = 'root'; //MySql usuario
$db_password        = 'Alex99'; //MySql password
$db_name            = 'mi_tienda'; //MySql nombre
$db_host            = 'localhost'; //MySql hostname

$currency           = '₹ '; //currency symbol
$coste_compra      = 1.50; //shipping cost
$impuestos             = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5,
                            'Other Tax' => 10
                            );

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //conecta con mysql
if ($mysqli_conn->connect_error) {//Muestra el error si ocurre
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);

?>