<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Cambios</title>
</head>
<body>
    <h1>Historial de Cambios</hjson_encode($data); ?>
    <ul>
        <?php foreach ($cambios as $cambio) : ?>
            <li>
                <strong>Fecha:</strong> <?php echo $cambio->fecha; ?><br>
                <strong>Usuario:</strong> <?php echo $cambio->usuario; ?><br>
                <strong>Acción:</strong> <?php echo $cambio->accion; ?><br>
                <strong>Tabla:</strong> <?php echo $cambio->tabla; ?><br>
                <strong>Valor Anterior:</strong> <?php echo $cambio->valorAnterior; ?><br>
                <strong>Valor Nuevo:</strong> <?php echo $cambio->valorNuevo; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>