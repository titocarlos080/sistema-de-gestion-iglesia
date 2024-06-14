<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA DE DIOS REFORMADA</title>

</head>

<body>
    <nav style="display: flex; flex-direction: row; justify-content: end;">
        <div>
            <form action="/logout" method="post"><button style="margin-top: 5px; background: red;" type="submit">Cerrar Sesion</button> </form>
        </div>
    </nav>
    <div class="content" style=" display: flex;flex-direction: column; justify-content: center; align-items: center;">
    <?= $title ?>
       
        <div class="content-form" style="background: #fff;">
            <?= $formulario ?>


        </div>

        <div id="contenedor_cards" class="content-card">
            <?= $tarjetas ?>



        </div>
    </div>

    <div class="drawer" id="myDrawer">
        <?php

        include("drawer.php");
        ?>

    </div>



</body>



</html>