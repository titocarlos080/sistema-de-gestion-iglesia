<?php

// File: C:\xampp\htdocs\mvc\app\controllers\PatronEstrategia\ReportePDF.php
require_once('../app/controllers/PatronEstrategia/ReporteStrategy.php');

use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ReportePDF implements ReporteStrategy
{
    public function generarReporte($ingresos): void
    {
      $contenido = '<!DOCTYPE html>
      <html>
      <head>
        <style>
          table {
            width: 100%;
            text-align: center;
          }
          th, td {
            padding: 5px;
          } 
          .header {
            text-align: center;
          }
          .date {
            position: absolute;
            top: 10px;
            right: 10px;
          }
        </style>
      </head>
      <body>
        <div class="header">
          <img src="" alt="Logo de la iglesia">
          <h1>Inglesia de Dios Reformada</h1>
        </div>
        <div class="date">
          Fecha de impresión: ' . date("d/m/Y") . '
        </div>
        <table border="1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo de Ingreso</th>
              <th>Monto</th>
              <th>Evento</th>
            </tr>
          </thead>
          <tbody>';
      
      foreach ($ingresos as $ingreso) {
        $contenido .= '<tr>';
        $contenido .= '<td>' . $ingreso->getId() . '</td>';
        $contenido .= '<td>' . $ingreso->getTipoIngreso() . '</td>';
        $contenido .= '<td>' . $ingreso->getMonto() . '</td>';
        $contenido .= '<td>' . $ingreso->getEventoId() . '</td>';
        $contenido .= '</tr>';
      }
      
      $contenido .= '</tbody>
        </table>
      </body>
      </html>';
      

        // Opciones para prevenir errores con carga de imágenes
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Instancia de la clase
        $dompdf = new Dompdf($options);

        // Cargar el contenido HTML
        $dompdf->loadHtml($contenido);

        // Formato y tamaño del PDF
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar HTML como PDF
        $dompdf->render();

        // Salida para descargar
        $dompdf->stream('reporte.pdf', ['Attachment' => true]);
    }
}
