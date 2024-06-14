<?php

 

class Biblia implements IBiblia
{
 
    public function __construct()
    {
       
    }

    public function obtenerVersiculos($query, $version, $returnFormat)
    {
        $url = "https://query.bibleget.io/index2.php";

        $data = array(
            'query' => $query,
            'version' => $version,
            'returnFormat' => $returnFormat
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $versiculos = json_decode($response, true);

        if (!isset($versiculos['results'])) {
            return ['Error al obtener versículos'];
        }

        $respuestaFormateada = [];

        foreach ($versiculos['results'] as $versiculo) {
            $verso =  [
                'libro' =>$versiculo['book'],
                'capitulo' => $versiculo['chapter'],
                'versiculo' => $versiculo['verse'],
                'texto' =>  $versiculo['text']
            ];
            $respuestaFormateada[] = $verso;
        }

        return $respuestaFormateada;
    }
}
