<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA DE DIOS REFORMADA</title>

</head>

<body>
    <div class="content">
        
        <?= $formulario ?>

        <h1><?= $title ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>CI</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?= $tbody ?>
        </table>
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
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            // Si el usuario confirma, enviar el formulario de eliminación
            document.querySelector('form[action="/eliminar_usuario"] input[name="id"]').value = id;
            document.querySelector('form[action="/eliminar_usuario"]').submit();
        }
    }
</script>

</html>