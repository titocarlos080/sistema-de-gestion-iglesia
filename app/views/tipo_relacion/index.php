 
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
    <h2>Nuevo Tipo de Relación</h2>
    <div id='form_tipo'>
        <form action="/tipo_relacion" method="post">
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="nombre">Nombres</label>
                    <input name="nombre" type="text" id="nombre" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <button class="add-button" type="submit">Agregar</button>
                    <!-- <input type="reset" value="Reset"> -->
                </div>
            </div>
        </form>
    </div>

    <h1><?= $title ?></h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
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
        if (confirm('¿Estás seguro de que deseas eliminar este tipo relaciòn?')) {
            // Si el usuario confirma, enviar el formulario de eliminación
            document.querySelector('form[action="/eliminar_tipo_relacion"] input[name="id"]').value = id;
            document.querySelector('form[action="/eliminar_tipo_relacion"]').submit();
        }
    }
</script>
</html>




