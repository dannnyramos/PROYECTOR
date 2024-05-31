<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Información de Tonos</title>
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

  .container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
  }

  .table-container {
    margin-right: 20px;
    width: 50%;
  }

  table {
   width: 100%;
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

  .image-container {
    width: 20%; /* Ancho de la tabla de la imagen */
  }

  .image {
    max-width: 100%; /* Ancho máximo de la imagen */
    height: 50 px;
    margin-bottom: 1px;
  }
 </style>
</head>
<body>
 

 <div class="container">
   <div class="table-container">
    <table>
     <tr>
       <th class="logo">
        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="150px">
       </th>
       <td colspan="3"> PLANTA KETER CARRIZAL: Camino a Atoluca No. 6, Atoluca, C.P. 73967 Teziutlán Puebla</td>
      </tr>
    </table>
    <table>
      <tr class="info-section">
      <td colspan="3" style="text-align: center; background-color: #ADD8E6; box-shadow: 2px 2px 5px #888888;">Información del Tono</td>
    </tr>
    <tr>
      <th>Color</th>
      <td><?php echo $tonos[0]->color; ?></td>
    </tr>
    <tr>
      <th>Código del Tono:</th>
      <td><?php echo $tonos[0]->codigo; ?></td>
    </tr>
    <tr>
      <th>Tonalidad</th>
      <td>
        <?php echo $tonos[0]->tonalidad; ?>
      </td>
    </tr>
  </table>
  </div>
  <div class="image-container">
    <table>
      <tr>
        <td class="info-section" colspan="4" style="text-align: center; background-color: #ADD8E6; box-shadow: 2px 2px 5px #888888;">Imagen</td>
      </tr>
      <tr>
        <td class="image-container" style="text-align: center;">  
          <?php if ($tonos[0]->foto): ?>
            <img src="<?= base_url('/uploader/image/') . $tonos[0]->foto ?>"  class="image" alt="" width="480" height="450">
          <?php else: ?>
            <img src="<?= base_url('/uploader/image/lap.png') ?>" class="image" alt="Foto (No disponible)">
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>
 </div>

</body>
</html>
