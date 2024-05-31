<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de Rollos</title>
  <style>
    body {
      font-family: Verdana, sans-serif;
      margin: 20px;
    }

    h1 {
      font-family: Georgia, serif;
      font-size: 34px;
      text-align: center;
      color: #333;
      margin-top: 20px;
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
      <tr class="info-section">
      <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Información del resgistro de colores</td>
    </tr>
    <tr>
      <th>Código Rollo</th>
      <td><?php echo $rollos[0]->codigoRollo; ?></td>
    </tr>
    <tr>
      <th>Código</th>
      <td><?php echo $rollos[0]->codigo; ?></td>
    </tr>
    <tr>
      <th>Peso Inicial</th>
      <td><?php echo $rollos[0]->peso_Kg; ?></td>
    </tr>
    <tr>
      <th>Peso Final</th>
      <td><?php echo $rollos[0]->pesoF; ?></td>
    </tr>
    <tr>
   <th>Tela</th>
       <td>
           <?php echo (isset($tela) ? $tela->tipo . ' - ' . $tela->composicion . ' - ' . $tela->pesoGrs : 'N/A'); ?>
       </td>
   </tr>
    <tr>
      <th>Comentarios</th>
      <td><?php echo $rollos[0]->comentarios; ?></td>
    </tr>
</body>
</html>
