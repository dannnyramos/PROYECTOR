<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autorizaciones</title>
</head>
<body>
 

    <a href="<?php echo base_url('autorizaciontono/nuevo_formulario/'); ?>" class="btn btn-primary">Nueva Autorización</a>
    <table>
        <thead>
            <tr>
                <th>Código Lapdik</th>
                <th>Letra Autorizada</th>
                <th>Fecha de Autorización</th>
                <th>Autorizo</th>
                <th>Comentarios</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($autorizaciones as $autorizacion): ?>
                <tr>
                    <td><?php echo $autorizacion->codigoLapdik; ?></td>
                    <td><?php echo $autorizacion->letraAutorizada; ?></td>
                    <td><?php echo $autorizacion->fechaAutorizacion; ?></td>
                    <td><?php echo $autorizacion->autorizo; ?></td>
                    <td><?php echo $autorizacion->comentarios; ?></td>
                    <td><?php echo $autorizacion->estatus; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
