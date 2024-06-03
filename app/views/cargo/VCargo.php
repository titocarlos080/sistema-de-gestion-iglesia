<?php

declare(strict_types=1);

class VCargo
{
    private function renderizarTabla(array $cargos): string
    {
        $rowData = '';

        if (empty($cargos)) {
            return "<tbody></tbody>";
        }

        foreach ((array)$cargos as $cargo) {
            $rowData .= "<tr>";
            $rowData .= "<td>{$cargo->getId()}</td>";
            $rowData .= "<td>{$cargo->getNombre()}</td>";
            $rowData .= "<td>{$cargo->getDescripcion()}</td>";
            $rowData .= "<td><a href='/editar_cargo?id={$cargo->getId()}' class='edit-button'>Editar</a> ";
          
            $rowData .= "<form id='form_boton_eliminar' method='post' action='/eliminar_cargo'>";
            $rowData .= "<input type='hidden' name='id' value='{$cargo->getId()}'>";
            $rowData .= "<button type='button' onclick='confirmarEliminar({$cargo->getId()})' class='delete-button' style='font-size: 16px;'>Eliminar</button>";
            $rowData .= "</form>";
            $rowData .= "</td>";
            $rowData .= "</tr>";
        }

        return "<tbody>$rowData</tbody>";
    }

    public function actualizar(array $cargos): void
    {
        $title = 'Cargos - Usuarios';
        $tbody = $this->renderizarTabla($cargos);
        include '../app/views/cargo/index.php';
    }

    private function renderizarFormularioEdicion( $cargo): string
    {
        $formulario = '';

        if (!empty($cargo) && $cargo) {
            $formulario .= "<form method='post' action='/actualizar_cargo'>";
            $formulario .= "<input type='hidden' name='id' value='{$cargo->getId()}'>";
            $formulario .= "<label for='nombre'>Nombres:</label>";
            $formulario .= "<input type='text' id='nombre' name='nombre' value='{$cargo->getNombre()}' required>";
            $formulario .= "<label for='descripcion'>Descripción:</label>";
            $formulario .= "<input type='text' id='descripcion' name='descripcion' value='{$cargo->getDescripcion()}' required>";
            $formulario .= "<button type='submit'>Actualizar</button>";
            $formulario .= "<a href='/cargos'>Volver</a>";
            $formulario .= "</form>";
        } else {
            $formulario .= "El cargo no se encontró o no existe.";
        }
        

        return $formulario;
    }

    public function mostrarFormularioEdicion(Cargo $cargo): void
    {
        $title = 'Cargo - Editar';
        $formulario = $this->renderizarFormularioEdicion($cargo);
        include '../app/views/cargo/edit.php';
    }
}

