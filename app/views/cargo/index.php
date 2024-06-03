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
             <h2>Nuevo Cargo</h2>
             <div id='form_cargo'>
                 <form action="/cargos" method="post">
                     <div class="row">
                         <div class="col-12 col-md-4">
                             <label for="nombre">Nombre</label>
                             <input name="nombre" type="text" id="nombre" required>
                         </div>
                         <div class="col-12 col-md-4">
                             <label for="descripcion">Descripción</label>
                             <input name="descripcion" type="text" id="descripcion" required>
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-12 d-flex justify-content-end">
                             <button class="add-button" type="submit">Agregar</button>
                         </div>
                     </div>
                 </form>
             </div>

             <h1><?= $title ?></h1>
             <table>
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Nombre</th> <!-- Cambiado a Nombre -->
                         <th>Descripción</th> <!-- Agregado campo de descripción -->
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
            if (confirm('¿Estás seguro de que deseas eliminar este cargo?')) {
                // Si el usuario confirma, enviar el formulario de eliminación
                document.querySelector('form[action="/eliminar_cargo"] input[name="id"]').value = id;
                document.querySelector('form[action="/eliminar_cargo"]').submit();
            }
        }
    </script>
 </html>