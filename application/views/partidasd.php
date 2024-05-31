<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Partida: <?php echo $informacionPartida->partida; ?></title>
</head>
<body>
    <h1>Detalle de Partida</h1>

    <table>
        <tr>
            <th>Partida</th>
            <th>Código Rollo</th>
            <th>Código</th>
            <th>Peso Rollo</th>
            <th>Tipo Tela</th>
            <th>Composición Tela</th>
            <th>Peso Tela (gr/m²)</th>
        </tr>
        <?php foreach ($informacionPartida as $row) { ?>
            <tr>
                <td><?php echo $row->partida; ?></td>
                <td><?php echo $row->codigoRollo; ?></td>
                <td><?php echo $row->codigo; ?></td>
                <td><?php echo $row->peso; ?></td>
                <td><?php echo $row->tipoTela; ?></td>
                <td><?php echo $row->composicionTela; ?></td>
                <td><?php echo $row->pesoGrsTela; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
