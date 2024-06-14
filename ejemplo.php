<?php
function obtenerVersiculos($libro, $capitulo, $versiculos) {
    // URL base de la API de BibleGet
    $url = "https://www.bibleget.io/get";

    // Construir la consulta para obtener los versículos
    $query = http_build_query([
         'book' => $libro,
        'chapter' => $capitulo,
        'verses' => $versiculos
    ]);

    // Crear contexto de flujo para la solicitud HTTP
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => 'Content-Type: application/json'
        ]
    ]);

    // Realizar la solicitud a la API de BibleGet
    $response = file_get_contents("$url?$query", false, $context);

    // Decodificar la respuesta JSON
    $versiculos = json_decode($response, true);

    // Retornar los versículos obtenidos
    return $versiculos;
}

// Ejemplo de uso
$libro = 'Mateo';
$capitulo = 1;
$versiculos = '1-5';

$versiculosObtenidos = obtenerVersiculos($libro, $capitulo, $versiculos);
print_r($versiculosObtenidos);
