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
             <h1><?= $title ?></h1>
             <?= $formulario ?>

             <table>
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Tipo de Ingreso</th>
                         <th>Monto (Bs)</th>
                         <th>Evento</th>
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
         if (confirm('¿Estás seguro de que deseas eliminar este ingreso?')) { // Actualizado mensaje
             // Si el usuario confirma, enviar el formulario de eliminación
             document.querySelector('form[action="/eliminar_ingreso"] input[name="id"]').value = id; // Actualizado formulario de eliminación
             document.querySelector('form[action="/eliminar_ingreso"]').submit(); // Actualizado formulario de eliminación
         }
     }
 </script>

 </html>