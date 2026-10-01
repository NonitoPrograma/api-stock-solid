<?php
require_once "movimientoService.php";
require_once "dto.php";

class movimientoController {
    private movimientoService $service;

    public function __construct(movimientoService $service) {
        $this->service = $service;
    }


    public function formato() {
        $movimiento = json_decode(file_get_contents('php://input'));


        if ($movimiento === null
            || !isset($movimiento->ventaId, $movimiento->fecha, $movimiento->cajeroId, $movimiento->productos)
            || !is_array($movimiento->productos)) {
            http_response_code(400);
            return ["error" => "JSON invalido o incompleto"];
        }


        $venta = new DTO($movimiento->ventaId, $movimiento->fecha, $movimiento->cajeroId, $movimiento->productos);


        if (!$this->service->procesarVenta($venta)) {
            http_response_code(502);
            return ["error" => "No se pudo registrar en el sistema B"];
        }

        return ["ok" => true, "referencia" => "VENTA-" . $venta->ventaId];
    }
}



