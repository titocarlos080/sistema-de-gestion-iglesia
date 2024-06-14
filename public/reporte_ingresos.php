 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ingresos</title>
    <img src="/img/logo.jpg" alt="logo"  >
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Ingresos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Tipo de Ingreso</th>
            <th>Monto</th>
            <th>ID de Evento</th>
        </tr>
        <?php foreach ($data as $ingreso): ?>
        <tr>
            <td><?php echo $ingreso->getId(); ?></td>
            <td><?php echo $ingreso->getTipoIngreso(); ?></td>
            <td><?php echo $ingreso->getMonto(); ?></td>
            <td><?php echo $ingreso->getEventoId(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
