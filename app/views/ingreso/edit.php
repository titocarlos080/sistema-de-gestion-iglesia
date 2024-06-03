 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA DE DIOS REFORMADA</title>

</head>

<body>
    <div class="content">
 
   

<div class="container">
    <h2><?= $title ?></h2>

    <!-- Muestra el formulario de edición aquí -->
    <?= $formulario ?>

    <!-- Más contenido HTML si es necesario -->
</div>

   
    </div>

    <div class="drawer" id="myDrawer">
        <?php

        include("drawer.php");
        ?>

    </div>



</body>

<script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este ingreso?')) {
            // Si el usuario confirma, enviar el formulario de eliminación
            document.querySelector('form[action="/eliminar_ingreso"] input[name="id"]').value = id;
            document.querySelector('form[action="/eliminar_ingreso"]').submit();
        }
    }
</script>
</html>


