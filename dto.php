<?php
require_once "productoModel.php";

class DTO {
    public $ventaId;
    public $fecha;
    public $cajeroId;
    public $productos = [];

    public function __construct($ventaId, $fecha, $cajeroId, array $productos) {
        $this->ventaId  = $ventaId;
        $this->fecha    = $fecha;
        $this->cajeroId = $cajeroId;
        foreach ($productos as $info) {
            $this->productos[] = new producto($info->codigo, $info->cantidad, $info->precioUnitario);
        }
    }
}