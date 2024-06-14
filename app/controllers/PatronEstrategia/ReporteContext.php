<?php
require_once('../app/controllers/PatronEstrategia/ReporteStrategy.php');
 
class ReporteContext{
    private $strategy;

    public function setStrategy(ReporteStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function generarReporte( $data): void
    {
        $this->strategy->generarReporte($data);
    }
}
