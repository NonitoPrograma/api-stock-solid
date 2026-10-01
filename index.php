<?php
header ("Content-Type: application/json; charset=UTF-8");
//INSTANCIAR TODAS LAS CLSES Q DIPARAS 
//SEGUIR EL ORDEN DE LAS INSTANCIASIONES 
//ULTIMA LINEA LLAMADA AL METODO DE CONTROLER 
require_once "movimientoController.php";
require_once "LogStockConnector.php";
require_once "erpStockConnector.php";

$conector   = new LogStockConnector();   // para probar
// $conector = new ErpStockConnector();
$service    = new movimientoService($conector);
$controller = new movimientoController($service);

echo json_encode($controller->formato());
?>