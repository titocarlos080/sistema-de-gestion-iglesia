<?php
require_once('../app/controllers/CHome.php');
require_once('../app/controllers/CTipoRelacion.php');
require_once('../app/controllers/CCargo.php');
require_once('../app/controllers/CEvento.php');
require_once('../app/controllers/CUsuario.php');
require_once('../app/controllers/CRelacion.php');
require_once('../app/controllers/CIngreso.php');

// GET requests
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_SERVER['REQUEST_URI'] == '/') {
        $home = new CHome();
        $home->index();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/cargos') {
        $cargo = new CCargo();
        $cargo->mostrarCargos();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/tipo_relacion') {
        $tipo_relacion = new CTipoRelacion();
        $tipo_relacion->mostrarTipoRelacion();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/usuarios') {
        $usuario = new CUsuario();
        $usuario->mostrarUsuarios();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eventos') {
        $evento = new CEvento();
        $evento->mostrarEventos();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/relaciones') {
        $relacion = new CRelacion();
        $relacion->mostrarRelaciones();
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/ingresos') {
        $ingreso = new CIngreso();
        $ingreso->mostrarIngresos();
        return;
    }

    if (preg_match('/\/editar_cargo\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $cargo = new CCargo();
        $cargo->updateCargo($id);
        return;
    }

    if (preg_match('/\/editar_tipo_relacion\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $categoria = new CTipoRelacion();
        $categoria->updateTipoRelacion($id);
        return;
    }

    if (preg_match('/\/editar_usuario\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $usuario = new CUsuario();
        $usuario->updateUsuario($id);
        return;
    }

    if (preg_match('/\/editar_evento\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $evento = new CEvento();
        $evento->updateEvento($id);
        return;
    }

    if (preg_match('/\/editar_relacion\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $relacion = new CRelacion();
        $relacion->updateRelacion($id);
        return;
    }

    if (preg_match('/\/editar_ingreso\?id=\d+/', $_SERVER['REQUEST_URI'])) {
        $params = $_GET;
        $id = $params['id'];
        $ingreso = new CIngreso();
        $ingreso->updateIngreso($id);
        return;
    }
}

// POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SERVER['REQUEST_URI'] == '/cargos') {
        $cargo = new CCargo();
        $cargo->agregarCargo($_POST['nombre'], $_POST['descripcion']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_cargo') {
        $cargo = new CCargo();
        $cargo->eliminarCargo($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_cargo') {
        $cargo = new CCargo();
        $cargo->editarCargo($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/tipo_relacion') {
        $tipo_relacion = new CTipoRelacion();
        $tipo_relacion->agregarTipoRelacion($_POST['nombre']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_tipo_relacion') {
        $categoria = new CTipoRelacion();
        $categoria->eliminarTipoRelacion($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_tipo_relacion') {
        $categoria = new CTipoRelacion();
        $categoria->editarTipoRelacion($_POST['id'], $_POST['nombre']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/usuarios') {
        $usuario = new CUsuario();
        $usuario->agregarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['ci'], $_POST['cargo']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_usuario') {
        $usuario = new CUsuario();
        $usuario->eliminarUsuario($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_usuario') {
        $usuario = new CUsuario();
        $usuario->editarUsuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['ci'], $_POST['cargo']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eventos') {
        $evento = new CEvento();
        $evento->agregarEvento($_POST['nombre'], $_POST['fecha'], $_POST['descripcion'], $_POST['usuario_id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_evento') {
        $evento = new CEvento();
        $evento->eliminarEvento($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_evento') {
        $evento = new CEvento();
        $evento->editarEvento($_POST['id'], $_POST['nombre'], $_POST['fecha'], $_POST['descripcion'], $_POST['usuario_id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/relaciones') {
        $relacion = new CRelacion();
        $relacion->agregarRelacion($_POST['usuarioA'], $_POST['usuarioB'], $_POST['tipoRelacionA'], $_POST['tipoRelacionB']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_relacion') {
        $relacion = new CRelacion();
        $relacion->eliminarRelacion($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_relacion') {
        $relacion = new CRelacion();
        $relacion->editarRelacion($_POST['id'], $_POST['usuarioA'], $_POST['usuarioB'], $_POST['tipoRelacionA'], $_POST['tipoRelacionB']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/ingresos') {
        $ingreso = new CIngreso();
        $ingreso->agregarIngreso($_POST['tipoIngreso'], $_POST['monto'], $_POST['evento_id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/eliminar_ingreso') {
        $ingreso = new CIngreso();
        $ingreso->eliminarIngreso($_POST['id']);
        return;
    }

    if ($_SERVER['REQUEST_URI'] == '/actualizar_ingreso') {
        $ingreso = new CIngreso();
        $ingreso->editarIngreso($_POST['id'], $_POST['tipoIngreso'], $_POST['monto'], $_POST['evento_id']);
        return;
    }
   
    if ($_SERVER['REQUEST_URI'] == '/reportes') {

        $reporte = new ReporteContext();
        if ("pdf" == $_POST["tipo"]) {
            $reporte->setStrategy(new  ReportePDF());
            # code...
        }
        if ("excel" == $_POST["tipo"]) {
            $reporte->setStrategy(new  ReporteExcel());
            # code...
        }

        $reporte->generarReporte($_POST["data"]);
    }



}
