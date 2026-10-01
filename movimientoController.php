<?php
require_once "movimientoService.php";
require_once "dto.php";

class movimientoController {
    private movimientoService $service; // el service se recibe de afuera (inyección de dependencias)

    public function __construct(movimientoService $service) {
        $this->service = $service;
    }

    // Recibe la venta del sistema A, la valida, la procesa y devuelve la respuesta
    public function formato() {
        $movimiento = json_decode(file_get_contents('php://input'));

        // isset comprueba que las variables existan y no sean null
        if ($movimiento === null
            || !isset($movimiento->ventaId, $movimiento->fecha, $movimiento->cajeroId, $movimiento->productos)
            || !is_array($movimiento->productos)) {
            http_response_code(400);
            return ["error" => "JSON invalido o incompleto"];
        }

        // El DTO arma la venta con sus productos
        $venta = new DTO($movimiento->ventaId, $movimiento->fecha, $movimiento->cajeroId, $movimiento->productos);

        // El service transforma los datos del sistema A al formato del B y los envía
        if (!$this->service->procesarVenta($venta)) {
            http_response_code(502);
            return ["error" => "No se pudo registrar en el sistema B"];
        }

        return ["ok" => true, "referencia" => "VENTA-" . $venta->ventaId];
    }
}



