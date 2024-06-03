<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;

class ReportePDF implements ReporteStrategy
{
    public function generarReporte(array $data): void
    {
        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Llenar la hoja de cálculo con datos
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellido');

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['nombre']);
            $sheet->setCellValue('C' . $row, $item['apellido']);
            $row++;
        }

        // Configurar el PDF
        IOFactory::registerWriter('Pdf', Dompdf::class);
        $writer = IOFactory::createWriter($spreadsheet, 'Pdf');

        // Guardar el archivo PDF
        $writer->save('reporte.pdf');

        echo "Reporte PDF generado correctamente.\n";
    }
}