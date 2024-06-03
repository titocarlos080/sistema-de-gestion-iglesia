<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA DE DIOS REFORMADA</title>

</head>

<body>
    <nav style="display: flex; flex-direction: row; justify-content: end;">
        <div  >
            <form action="/logout" method="post"><button style="margin-top: 5px; background: red;" type="submit">Cerrar Sesion</button> </form>
        </div>  
    </nav>
    <div class="content" style="display: flex; flex-direction: row; flex-wrap: wrap;">
        <div class="card">
            <h3>Salmo 23:1</h3>
            <p>El Señor es mi pastor, nada me falta;</p>
        </div>
        <div class="card">
            <h3>Salmo 23:2</h3>
            <p>en verdes pastos me hace descansar.</p>
        </div>
        <div class="card">
            <h3>Salmo 23:3</h3>
            <p>Me guía por senderos de justicia por amor a su nombre.</p>
        </div>
        <div class="card">
            <h3>Salmo 23:4</h3>
            <p>Aunque pase por el valle de sombra de muerte, no temeré mal alguno, porque tú estás conmigo;</p>
        </div>
        <div class="card">
            <h3>Salmo 23:5</h3>
            <p>me en ungiste mi cabeza con aceite; mi copa está rebosando.</p>
        </div>
        <div class="card">
            <h3>Salmo 23:6</h3>
            <p>Ciertamente tu bondad y tu misericordia me seguirán todos los días de mi vida, y en la casa del Señor moraré por largos días.</p>
        </div>


    </div>

    <div class="drawer" id="myDrawer">
        <?php

        include("drawer.php");
        ?>

    </div>



</body>

</html>