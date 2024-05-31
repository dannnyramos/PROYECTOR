<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Formulario de Autorización</title>
</head>
<body>
    <h1>Nueva Autorización</h1>
    <form method="post" action="<?php echo base_url('index.php/autorizaciontono/guardar_formulario'); ?>">
        <input type="hidden" name="codigoLapdik" value="<?php echo $codigoLapdik; ?>">
        Letra Autorizada: <input type="text" name="letraAutorizada"><br>
        Fecha de Autorización: <input type="date" name="fechaAutorizacion"><br>
        Autorizo: <input type="text" name="autorizo"><br>
        Comentarios: <input type="text" name="comentarios"><br>
        Estatus: <input type="text" name="estatus"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
