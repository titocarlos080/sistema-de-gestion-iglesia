<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA DE DIOS REFORMADA</title>

</head>

<body>
    <div class="content">
    <main>
        <?= $formulario ?>
        <h1><?= $title ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario A</th>
                    <th>Usuario B</th>
                    <th>Tipo de Relación A </th>
                    <th>Tipo de Relación B</th>
                    <th>Acciones</th>

                    
                    
                    
                </tr>
            </thead>
            <?= $tbody ?>
        </table>
    </main>


    </div>

    <div class="drawer" id="myDrawer">
        <?php

        include("drawer.php");
        ?>

    </div>



</body>
<script>
        function confirmarEliminar(id) {
            if (confirm('¿Estás seguro de que deseas eliminar esta relación?')) {
                // Si el usuario confirma, enviar el formulario de eliminación
                document.querySelector('form[action="/eliminar_relacion"] input[name="id"]').value = id;
                document.querySelector('form[action="/eliminar_relacion"]').submit();
            }
        }
    </script>
</html>










 