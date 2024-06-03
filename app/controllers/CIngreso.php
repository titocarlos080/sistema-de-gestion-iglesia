<?php

declare(strict_types=1);

require_once('../app/models/Ingreso/MIngreso.php');
require_once('../app/models/Evento/MEvento.php'); // Corregido el nombre de la clase MEvento
require_once('../app/views/ingreso/VIngreso.php');

class CIngreso
{
    private VIngreso $vista;
    private MIngreso $modeloIngreso;
    private MEvento $modeloEvento; 
    public function __construct()
    {
        $this->vista = new VIngreso();
        $this->modeloIngreso = new MIngreso();
        $this->modeloEvento = new MEvento();
    }

    public function mostrarIngresos(): void
    {
        $ingresos = $this->modeloIngreso->mostrarIngresos();
        $eventos = $this->modeloEvento->mostrarEventos(); 
        $this->vista->actualizar($ingresos, $eventos); 
    }

    public function agregarIngreso(string $tipo_ingreso, float $monto, int $evento_id): void
    {
        $this->modeloIngreso->agregarIngreso($tipo_ingreso, $monto, $evento_id);
        $ingresos = $this->modeloIngreso->mostrarIngresos();
        $eventos = $this->modeloEvento->mostrarEventos();
        $this->vista->actualizar($ingresos, $eventos);
    }

    public function eliminarIngreso(int $id): void
    {
        $this->modeloIngreso->eliminarIngreso($id);
        $ingresos = $this->modeloIngreso->mostrarIngresos();
        $eventos = $this->modeloEvento->mostrarEventos();
        $this->vista->actualizar($ingresos, $eventos);
    }

    public function editarIngreso(int $id, string $tipo_ingreso, float $monto, int $evento_id): void
    {
        $this->modeloIngreso->editarIngreso($id, $tipo_ingreso, $monto, $evento_id);
        $ingresos = $this->modeloIngreso->mostrarIngresos();
        $eventos = $this->modeloEvento->mostrarEventos();
        $this->vista->actualizar($ingresos, $eventos);
    }

    public function updateIngreso(int $id): void
    {
        $ingreso = $this->modeloIngreso->buscarIngreso($id);
        $eventos = $this->modeloEvento->mostrarEventos();
        $this->vista->mostrarFormularioEdicion($ingreso, $eventos);
    }
}
