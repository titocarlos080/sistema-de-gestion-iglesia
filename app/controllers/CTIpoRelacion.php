<?php

declare(strict_types=1);

require_once('../app/models/Tipo_Relacion/MTipoRelacion.php');
require_once('../app/views/tipo_Relacion/VTipoRelacion.php');

class CTipoRelacion
{
    private VTipoRelacion $vista;
    private MTIpoRelacion $modelo;


    public function __construct()
    {
        $this->vista = new VTipoRelacion();
        $this->modelo = new MTIpoRelacion();
    }

    public function mostrarTipoRelacion(): void
    {

        $tipo_relaciones = $this->modelo->mostrarTipos();

        $this->vista->actualizar($tipo_relaciones);
    }

    public function agregarTipoRelacion(string $nombre): void
    {

        $this->modelo->agregarTipo($nombre);

        $tipo_relaciones = $this->modelo->mostrarTipos();

        $this->vista->actualizar($tipo_relaciones);
    }

    public function eliminarTipoRelacion(int $id): void
    {
        $this->modelo->eliminarTipo($id);

        $tipo_relaciones = $this->modelo->mostrarTipos();

        $this->vista->actualizar($tipo_relaciones);
    }

    public function updateTipoRelacion(int $id): void
    {
        $tipo_relacion = $this->modelo->buscarTipo($id);
        $this->vista->mostrarFormularioEdicion($tipo_relacion);
    }

    public function editarTipoRelacion(int $id, string $nombre): void
    {

        $this->modelo->editarTipo($id, $nombre);

        $tipo_relaciones = $this->modelo->mostrarTipos();

        $this->vista->actualizar($tipo_relaciones);
    }
}
