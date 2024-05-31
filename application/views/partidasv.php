<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Partidas</title>
</head>
<body>
    <h1>Lista de Partidas</h1>

    <table>
        <tr>
            <th>Partida</th>
            <th>Ver Detalle</th>
        </tr>
        <?php foreach ($partidas as $partidas) { ?>
            <tr>
                <td><?php echo $partidas->partidas; ?></td>
                <td><a href="<?php echo base_url('partidasd' . $partidas->codigoPartida); ?>">Ver Detalle</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
