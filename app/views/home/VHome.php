<?php

class VHome
{
    public function __construct()
    {
    }


    public function renderizarFormularioCrear(): string
    {
        $form =  '<form action="/obtener/versiculos" method="post">
                    <input type="text" name="libro" id="libro" placeholder="ej.Genesis1:1-5;2:1-5">
                    <button type="submit">Obtener</button>
                </form>';
        return $form;
    }

    public function mostrarVersiculos($versiculos)
{
    $tarjetas = '';
    foreach ($versiculos as $versiculo) {
        $referencia = htmlspecialchars($versiculo['libro'], ENT_QUOTES, 'UTF-8') . ' ' . 
                      htmlspecialchars($versiculo['capitulo'], ENT_QUOTES, 'UTF-8') . ':' . 
                      htmlspecialchars($versiculo['versiculo'], ENT_QUOTES, 'UTF-8');
        $texto = htmlspecialchars($versiculo['texto'], ENT_QUOTES, 'UTF-8');
        
        $tarjetas .= '<div class="card">
            <h3>' . $referencia . '</h3>
            <p>' . $texto . '</p>
        </div>';
    }
    return $tarjetas;
}


    public function actualizar($versos): void
    {
        $title = 'Versos';
        $formulario = $this->renderizarFormularioCrear();
        $tarjetas = $this->mostrarVersiculos($versos);
        include '../app/views/home/index.php';
    }
}
