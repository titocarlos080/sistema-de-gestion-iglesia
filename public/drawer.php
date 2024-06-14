<link rel="stylesheet" href="/css/style.css">
<div style="display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">

    <img src="/img/logo.jpg"  alt="logo"   style=" box-shadow: inset;  display: block; height: 100px; padding: 5px; width: 100px; border-radius: 50%; z-index: 2;" >
</div>
<a href="/home" onclick="toggleDrawer('/home'); return false;">Inicio</a>
<a href="/cargos" onclick="toggleDrawer('/cargos'); return false;">Cargos</a>
<a href="/usuarios" onclick="toggleDrawer('/usuarios'); return false;">Usuarios</a>
<a href="/eventos" onclick="toggleDrawer('/eventos'); return false;">Eventos</a>
<a href="/relaciones" onclick="toggleDrawer('/relaciones'); return false;">Relaciones</a>
<a href="/tipo_relacion" onclick="toggleDrawer('/tipo_relacion'); return false;">Tipo Relación</a>
<a href="/ingresos" onclick="toggleDrawer('/ingresos'); return false;">Ingresos</a>
<script src="/js/script.js"></script>
<script>
    function toggleDrawer(url) {
        // Redireccionar a la URL correspondiente
        window.location = url;
    }
</script>