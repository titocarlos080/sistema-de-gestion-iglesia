<?php

require_once('../app/controllers/PatronEstrategia/ReporteStrategy.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReporteCSV implements ReporteStrategy
{
    public function generarReporte($ingresos): void
    {
        // Crear un archivo temporal
        $file = new SplFileObject('php://temp', 'w');

        // Escribir los encabezados en el archivo CSV
        $file->fputcsv(['ID', 'Tipo de Ingreso', 'Monto', 'Evento']);

        // Escribir los datos de los ingresos en el archivo CSV
        foreach ($ingresos as $ingreso) {
            $file->fputcsv([
                $ingreso->getId(),
                $ingreso->getTipoIngreso(),
                $ingreso->getMonto(),
                $ingreso->getEventoId()
            ]);
        }

        // Establecer la posición del puntero al inicio del archivo
        $file->rewind();

        // Configurar las cabeceras para la descarga del archivo CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="reporte_ingresos.csv"');

        // Leer el contenido del archivo y enviarlo al navegador
        while (!$file->eof()) {
            echo $file->fgets();
        }

        // Cerrar el archivo
        $file = null;
    }
}

