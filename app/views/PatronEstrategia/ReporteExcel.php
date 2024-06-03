<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ReporteExcel implements ReporteStrategy
{
    public function generarReporte(array $data): void
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
        echo "Reporte Excel generado correctamente.\n";
    }
}
