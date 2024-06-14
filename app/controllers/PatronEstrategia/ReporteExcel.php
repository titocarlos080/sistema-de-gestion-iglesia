<?php

require_once('../app/controllers/PatronEstrategia/ReporteStrategy.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReporteExcel implements ReporteStrategy
{ 
    public function generarReporte($ingresos): void
    {
        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tipo de Ingreso');
        $sheet->setCellValue('C1', 'Monto');
        $sheet->setCellValue('D1', 'Evento');
    
        // Inicializar el índice de fila en 2
        $rowIndex = 2;
    
        // Agregar los datos de los ingresos al archivo Excel
        foreach ($ingresos as $ingreso) {
            $sheet->setCellValue('A' . $rowIndex, $ingreso->getId());
            $sheet->setCellValue('B' . $rowIndex, $ingreso->getTipoIngreso());
            $sheet->setCellValue('C' . $rowIndex, $ingreso->getMonto());
            $sheet->setCellValue('D' . $rowIndex, $ingreso->getEventoId());
            $rowIndex++;
        }
    
        // Crear el writer para Excel
        $writer = new Xlsx($spreadsheet);
    
        // Guardar el archivo en un buffer
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_contents();
        ob_end_clean();
    
        // Configurar las cabeceras para la descarga del archivo Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="reporte_ingresos.xlsx"');
        header('Content-Length: ' . strlen($excelOutput));
    
        // Enviar el archivo Excel al navegador
        echo $excelOutput;
    }
    
}
