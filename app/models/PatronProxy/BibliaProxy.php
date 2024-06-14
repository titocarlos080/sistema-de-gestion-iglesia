<?php

use function PHPSTORM_META\type;

require_once('../app/models/PatronProxy/IBiblia.php');
require_once('../app/models/PatronProxy/Biblia.php');

 
class BibliaProxy implements IBiblia
{   
    private $biblia;
    private $cacheFile; // Archivo donde se almacenarán los resultados
    private $cache;  

    public function __construct() {
        $this->biblia = new Biblia();
        $this->cacheFile = 'cache.json'; // Nombre del archivo de caché
        $this->loadCache(); // Cargar el caché existente al inicio
    }

    private function loadCache() {
        if (file_exists($this->cacheFile)) {
            $this->cache = json_decode(file_get_contents($this->cacheFile), true);
        } else {
            $this->cache = [];
        }
    }

    private function saveCache() {
        file_put_contents($this->cacheFile, json_encode($this->cache));
    }

    public function obtenerVersiculos($query, $version, $returnFormat) {
        $cacheKey = md5($query . $version . $returnFormat);

        if (isset($this->cache[$cacheKey])) {
            return $this->cache[$cacheKey];
        }

        // Si no hay resultados en el caché, realiza la petición
        $response = $this->biblia->obtenerVersiculos($query, $version, $returnFormat);

        // Almacena la respuesta en el caché
        $this->cache[$cacheKey] = $response ;
        $this->saveCache();

        return $response ;
    }
}
