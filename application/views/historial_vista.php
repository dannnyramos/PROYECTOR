<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de cambios</title>
</head>
<body>
    <h1>Historial de cambios</h1>
    
    <?php echo $output->output; ?>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Tabla</th>
                <th>ID del registro</th>
                <th>Campos modificados</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial as $h) { ?>
            <tr>
                <td><?php echo $h->fecha; ?></td>
                <td><?php echo $h->usuario; ?></td>
                <td><?php echo $h->accion; ?></td>
                <td><?php echo $h->tabla; ?></td>
                <td><?php echo $h->id_registro; ?></td>
                <td><?php echo $h->campos; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
