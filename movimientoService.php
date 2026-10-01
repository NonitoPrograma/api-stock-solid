
<?php
require_once "stockConnector.php";
require_once "dto.php";

class movimientoService {


private StockConnector $conector; //esto es q solo lo puede usar algo q lo conecte con la interfaz, o sea el stock

function __construct(StockConnector $conector) {
    $this->conector = $conector;
}

function procesarVenta($venta): bool { //te devuelve verdadero o falso segun si salio bien :D
    $movimiento = $this->cambioFormato($venta); //cambia el formato del A al B, como hiciste vos fabi
    return $this->conector->registrarMovimiento($movimiento);//le pasa el resultado al conector para q lo mande
}

function cambioFormato($venta){
        $stock=[];
    foreach($venta -> productos as $info){
        $stock []= [
          "codigoProducto"=>$info->codigo,
          "cantidad"=>$info-> cantidad
        ];
    }

        $salida=[
            "tipoMovimiento"=>'SALIDA',
            "fecha"=> $venta -> fecha,
            "referencia"=> 'VENTA-'.$venta ->ventaId,
            "productos"=> $stock

        ];
    return $salida; 
}

}

?>
