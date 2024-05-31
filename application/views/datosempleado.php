<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Empleado</title>
  <style>
    body {
      font-family: Verdana, sans-serif;
      margin: 30px;
    }

    h1 {
      font-family: Georgia , serif; /* Fuente */
      font-size: 34px; /* Tamaño de letra */
      text-align: center; /* Centrado */
      color: #333; /* Color del texto */
      margin-top: 20px; /* Margen superior */
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;

    }

    th, td {
      border: 2px solid black;
      padding: 5px;
    }

    th {
      text-align: center;
      background-color: #f2f2f2;
    }

    .logo {
      width: 150px;
      text-align: left;
    }

    .info-section {
      font-weight: bold;
    }
    .employee-details {
      background-color: #f2f2f2;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .employee-details th {
      text-align: center;
    }
  </style>
</head>
<body>
  <h1></h1>

  <table>
    <tr>
      <th class="logo">
        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
      </th>
      
      <td colspan="3" style="text-align: center;" > PLANTA KETER CARRIZAL: Camino a Atoluca No. 6, Atoluca, C.P. 73967 Teziutlán Puebla</td>
    </tr>
    <tr>
      <th colspan="2">
        <h2><?php echo $empleado[0]->nombre." ".$empleado[0]->apellidoPaterno." ".$empleado[0]->apellidoMaterno; ?></h2>
      </th>
      <th class="logo">
        <?php if($empleado[0]->foto): ?>
          <img src="<?=base_url('/uploader/image/').$empleado[0]->foto?>" width="150px">
        <?php else: ?>
          <img src="<?=base_url('/uploader/image/reemplazo.jpg')?>" width="150px">
        <?php endif; ?>
      </th>
    </tr>
    <tr class="employee-details">
          <th colspan="4" scope="row">Información de Contacto</th>
        </tr>
        <tr>
          <th>Planta:</th>
          <td colspan="3"><?php echo $empleado[0]->planta; ?></td>
        </tr>
        <tr>
          <th>Puesto:</th>
          <td colspan="3"><?php echo $empleado[0]->puesto; ?></td>
        </tr>
        <tr>
          <th>Correo:</th>
          <td colspan="3"><?php echo $empleado[0]->email; ?></td>
        </tr>
        
        <tr>
          <th>Teléfono:</th>
          <td colspan="3"><?php echo $empleado[0]->telefono; ?></td>
        </tr>

</table>
</body>
</html>
