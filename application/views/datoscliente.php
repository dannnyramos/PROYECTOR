<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Cliente</title>
  <style>
    body {
      font-family: Verdana, sans-serif;
      margin: 20px;
    }

    h1 {
      font-family: Georgia , serif; /* Fuente */
      font-size: 34px; /* Tamaño de letra */
      text-align: center; /* Centrado */
      color: #333; /* Color del texto */
      margin-top: 20px; /* Margen superior */
    }

    table {
      width: 90%;
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
  </style>
</head>
<body>
 

  <table>
    <tr>
      <th class="logo">
        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
      </th>
      <td colspan="3"> PLANTA KETER CARRIZAL: Camino a Atoluca No. 6, Atoluca, C.P. 73967 Teziutlán Puebla</td>
    </tr>
    <tr>
      <th colspan="2">
        <h2><?php echo $clientes[0]->cliente; ?></h2>
      </th>
      <th class="logo">
        <?php if($clientes[0]->foto): ?>
          <img src="<?=base_url('/uploader/image/').$clientes[0]->foto?>" width="200px">
        <?php else: ?>
          <img src="<?=base_url('/uploader/image/reemplazo.jpg')?>" width="200px">
        <?php endif; ?>
      </th>
    </tr>

    <tr class="info-section">
      <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Dirección</td>
    </tr>
    <tr>
      <td>Dirección:</td>
      <td colspan="3">
        <?php echo 'Calle ' . $clientes[0]->calle . ' No. Ext. ' . $clientes[0]->noExterior . ', No. Int. ' . $clientes[0]->noInterior . ', ' . $clientes[0]->colonia . ', C.P. ' . $clientes[0]->cp . ', ' . $clientes[0]->ciudad . ', ' . $clientes[0]->estado . ', ' . $clientes[0]->pais; ?>
      </td>
    </tr>

    <tr class="info-section">
      <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Información de Contacto</td>
    <tr>
      <td>Correo electrónico:</td>
      <td colspan="3"><?php echo $clientes[0]->correo; ?></td>
    </tr>
    <tr>
      <td>Teléfono 1:</td>
      <td colspan="3"><?php echo $clientes[0]->telefono1; ?></td>
    </tr>
    <tr>
      <td>Teléfono 2:</td>
      <td colspan="3"><?php echo $clientes[0]->telefono2; ?></td>
    </tr>
    
    </table>
</body>
</html>
