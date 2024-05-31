<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de la Autorizacion de Tonos</title>
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
      border: none; 
    }

    table {
      width: 100%; 
      border-collapse: collapse;
      margin-top: 0px;
      border: none; 
    }


    th, td {
      border: 0px solid black;
      padding: 5px;
    }
    th {
      text-align: right;
    }

    .info-section {
      font-weight: bold;
      background-color: #F2F2F2;
      padding: 10px 0;
    }

    .image-container {
      text-align: center;
    }

    .image {
      width: 360px;
      margin-bottom: 10px;
    }

    .campo-oculto {
      display: none;
    }

    .campo-visible {
      display: block; 
    }
    .image-container-wrapper {
      overflow-x: scroll; 
      white-space: nowrap; 
      display: inline-block; 
      width: 100%;
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
    </table>
    <table> 
     <tr>
      <th>Cliente</th>
      <td colspan="2" style="text-align: center; width: 70%;"> <u>COMERCIALIZADORA KETER</u> </td>
      <!--<td><?php echo $cliente->cliente ; ?></td>-->
    </tr>

    <tr>
      <th>Tela</th>
      <td colspan="2" style="text-align: center; width: 70%;"><u><?php echo $laps[0]->tela; ?></u></td>
      <!--<td><?php echo $tela->tipo . ' - ' . $tela->composicion . ' - ' . $tela->pesoGrs; ?></td>-->
    </tr>
    <tr>
      <th>Composición</th>
      <td colspan="2" style="text-align: center; width: 70%;"><u><?php echo $laps[0]->composicion; ?></u></td>
      <!--<td><?php echo $tela->tipo . ' - ' . $tela->composicion . ' - ' . $tela->pesoGrs; ?></td>-->
    </tr>
    <tr>
      <th>Tono</th>
      <td colspan="2" style="text-align: center; width: 70%;"><u><?php echo $tono->color?></u></td>
    </tr>
    <tr>
      <th>Código</th>
      <td colspan="2" style="text-align: center; width: 70%;"><u><?php echo $tono->codigo; ?></u></td>
    </tr>
    <tr>
      <th>Tonalidad</th>
      <td colspan="2" style="text-align: center; width: 70%;"><u><?php echo $tono->tonalidad; ?></u></td>
    </tr>
    <tr>
      <th>Fecha realización</th>
      <td colspan="2" style="text-align: center; width: 70%;" ><u><?php echo $laps[0]->fechaRealizacion; ?></u></td>
    </tr>
  </table>

  <table>
    <tr>
      <td class="info-section" colspan="4" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Imágenes</td>
    </tr>
    <tr>
      <td class="image-container"  style="  width: 25%;">
        <?php if ($laps[0]->A): ?>
          <img src="<?= base_url('/uploader/image/') . $laps[0]->A ?>" class="image" alt="Foto A">
        <?php else: ?>
          <img src="<?= base_url('/uploader/image/lap.png') ?>" class="image" alt="Foto A (No disponible)">
        <?php endif; ?>
        <p> A: <?php echo $laps[0]->formulaA; ?></p>
      </td>
      <td class="image-container"  style="  width: 25%;">
        <?php if ($laps[0]->B): ?>
          <img src="<?= base_url('/uploader/image/') . $laps[0]->B ?>" class="image" alt="Foto B">
        <?php else: ?>
          <img src="<?= base_url('/uploader/image/lap.png') ?>" class="image" alt="Foto B (No disponible)">
        <?php endif; ?>
        <p> B: <?php echo $laps[0]->formulaB; ?></p>
      </td>
      <td class="image-container" style="  width: 25%;">
        <?php if ($laps[0]->C): ?>
          <img src="<?= base_url('/uploader/image/') . $laps[0]->C ?>" class="image" alt="Foto C">
        <?php else: ?>
          <img src="<?= base_url('/uploader/image/lap.png') ?>" class="image" alt="Foto C (No disponible)">
        <?php endif; ?>
        <p> C: <?php echo $laps[0]->formulaC; ?></p>
      </td>
      <td class="image-container" style="  width: 25%;">
        <?php if ($laps[0]->D): ?>
          <img src="<?= base_url('/uploader/image/') . $laps[0]->D ?>" class="image" alt="Foto D">
        <?php else: ?>
          <img src="<?= base_url('/uploader/image/lap.png') ?>" class="image" alt="Foto D (No disponible)">
        <?php endif; ?>
        <p> D: <?php echo $laps[0]->formulaD; ?></p>
      </td>
    </tr>
  </table>

  <table>
   <tr>
    <td colspan="2" style="  width: 50%;">Fecha de autorización: <u><?php echo $laps[0]->fechaAutorizacion; ?></u></td>
    <td>Opción autorizada: <u><?php echo $laps[0]->letraAutorizada;?></u></td>
  </tr>
  <tr>
    <td colspan="2" style="  width: 50%;">Persona que autoriza: <u><?php echo $laps[0]->autorizo; ?></u></td>
    <td>Comentarios: <u><?php echo $laps[0]->comentarios;?></u></td>
  </tr>
</table>

</body>
</html>











