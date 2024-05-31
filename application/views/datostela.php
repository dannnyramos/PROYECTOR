<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de Telas</title>
  <style>
    body {
      font-family: Verdana, sans-serif;
      margin: 20px;
    }

    h1 {
      font-family: Georgia , serif; /* Fuente */
      font-size: 38px; /* Tamaño de letra */
      text-align: center; /* Centrado */
      color: #333; /* Color del texto */
      margin-top: 20px; /* Margen superior */
    }

    table {
      width: 80%;
      border-collapse: collapse;
      margin-top: 40px;
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
 
<table >
  <tr>
    <th class="logo">
      <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
    </th>
    <td colspan="3"> PLANTA KETER CARRIZAL: Camino a Atoluca No. 6, Atoluca, C.P. 73967 Teziutlán Puebla</td>
  </tr>
  <tr class="info-section">
    <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Información de la Tela</td>
  </tr>
  <tr>
    <th>Codigo Tela:</th>
    <td><?php echo $telas[0]->codigoTela; ?></td>
  </tr>
  <tr>
    <th>Tipo:</th>
    <td><?php echo $telas[0]->tipo; ?></td>
  </tr>
  <tr>
    <th>Composición:</th>
    <td><?php echo $telas[0]->composicion; ?></td>
  </tr>
  <tr>
    <th>Peso en Gramos:</th>
    <td><?php echo $telas[0]->pesoGrs; ?></td>
  </tr>
</table>
</body>
</html>
