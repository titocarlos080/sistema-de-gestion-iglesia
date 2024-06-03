<?php
require_once('../app/views/PatronEstrategia/ReporteStrategy.php');

class ReporteContext{
    private $strategy;

    public function setStrategy(ReporteStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function generarReporte(array $data): void
    {
        $this->strategy->generarReporte($data);
    }
}
