<?php
require_once('../app/models/PatronProxy/IBiblia.php');
require_once('../app/models/PatronProxy/BibliaProxy.php');
require_once('../app/views/home/VHome.php');

class CHome
{
    private IBiblia $interfacebilbia;
    private VHome $vista;

    public function __construct()
    {
        $this->vista = new VHome();
        $this->interfacebilbia = new BibliaProxy();
    }
    public function mostrarhome()
    {
        $versos  = [];
        $this->vista->actualizar($versos);
    }


    public function obtenerVersiculos($params): void
    {   
        $version ='BLPD';
        $format = 'json';
        $versos =  '';
        if (!empty($params)) {
            $versos = $this->interfacebilbia->obtenerVersiculos($params, $version, $format);
        } else {
            $versos =  '';
        }
      


        $this->vista->actualizar($versos);
    }
}
