<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de Pedidos</title>
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
      margin-top: 20px;
    }

    th, td {
      border: 2px solid black;
      padding: 5px;
    }

    th {
      text-align: center;
      background-color: #f2f2f2;
    }

    .info-section {
      font-weight: bold;
    }
    .lista-vertical {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .lista-vertical li {
      padding: 5px;
      border-bottom: 1px solid #ddd;
    }

    .lista-vertical li strong {
      font-weight: bold;
    }

    .espacio-firma {
      text-align: center;
    }

    .espacio-firma img {
      width: 100px;
      height: 100px;
    }

    .espacio-firma p {
      margin: 0;
      font-weight: bold;
    }
  </style>
</head>
<body>

 <!-- <table>  
    <tr>
      <th class="logo">
        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
      </th>

      <td colspan="3" style="text-align: center;">
      TEJIDO PLANTA IXTLAHUACA <?php ?><br>
    Avenida Manuel Avila Camacho No.17 Barrio de Ixtlahuaca <?php ?><br>
    C.P. 73968 Teziutlán Puebla <?php ?><br>
  </td>

      <td colspan="3"> 
      PLANTA KETER CARRIZAL <?php  ?><br>
      Camino a Atoluca No. 6, Atoluca, C.P. 73967 Teziutlán Puebla</td>
    </tr>
  </table> --> 

  <table>
    <tr>
      <th colspan="2">
        <h2>Pedido: <?php echo $pedido[0]->pedido; ?></h2>
      </th>
    </tr>

    <tr class="info-section">
      <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Información del Pedido</td>
    </tr>
    <tr>
      <td>Fecha Activación: <?php echo $pedido[0]->fechaActivacion; ?></td>
      <td>Estatus:<?php echo $pedido[0]->estatus; ?></td>
    </tr>
  </table> 
  <table>
    <tr class="info-section">
      <td colspan="2" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 8px #888888;">Información</td>
    </tr>

    <tr>
      <th>Proveedor:</th>
      <th>Enviar a:</th>
    </tr>
    <tr>
      <tr>
        <td>
          <?php echo $proveedorinterno->proveedor; ?><br>
          CALLE <?php echo $proveedorinterno->calle. ' # ' .$proveedorinterno->noExterior ; ?><br>
          COL <?php echo $proveedorinterno->colonia; ?><br>
          CP <?php echo $proveedorinterno->cp; ?> 
          <?php echo $proveedorinterno->ciudad; ?> 
          <?php echo $proveedorinterno->estado; ?> 
          <?php echo $proveedorinterno->pais; ?> <br>
          <?php echo $proveedorinterno->correo; ?>
        </td>
        <td>
          <?php echo $cliente->cliente; ?><br>
          CALLE <?php echo $cliente->calle . ' # ' . $cliente->noExterior ; ?><br>
          COL <?php echo $cliente->colonia; ?><br>
          <?php echo $cliente->cp; ?> 
          <?php echo $cliente->ciudad; ?> 
          <?php echo $cliente->estado; ?> 
          <?php echo $cliente->pais; ?> <br>
          TEL: <?php echo $cliente->telefono1; ?> - <?php echo $cliente->telefono2; ?><br>
          <?php echo $cliente->correo; ?>
        </td>
      </tr>
    </table>
    <table>
      <tr class="info-section">
        <td colspan="6" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;"></td>
      </tr>
      <tr>
        <th>Codigo:</th>
        <th>Descripcion:</th>
        <th>Total de KGS:</th>
        <th> </th>
        <th>Precio unitario:</th>
        <th>Importe:</th>
      </tr>

      <tr>
       <td colspan="1" style="width: 5%;"> </td>
       <td colspan="1" style="width: 50%;"><?php echo $pedido[0]->descripcionA; ?></td>
       <td colspan="1" style="width: 15%; text-align: center;"><?php echo $pedido[0]->kgsA; ?></td>
       <td colspan="1" style="width: 10%;"> </td>
       <td colspan="1" style="width: 10%; text-align: center;"><?php echo $pedido[0]->precioUnitario; ?></td>
       <td colspan="1" style="width: 10%; text-align: center;"><?php echo $pedido[0]->kgsA * $pedido[0]->precioUnitario; ?></td> 
     </tr>

     <tr>
       <td> </td>
       <td><?php echo $pedido[0]->descripcionB; ?></td>
       <td style="text-align: center;" ><?php echo $pedido[0]->kgsB; ?></td>
       <td> </td>
       <td style="text-align: center;" ><?php echo $pedido[0]->precioUnitario; ?></td>
       <td style="text-align: center;" ><?php echo $pedido[0]->kgsB * $pedido[0]->precioUnitario; ?></td> 
     </tr>

   </table>

   <table> 
    <tr>
      <th colspan="3" style="text-align: right; width: 90%;" >SUB-TOTAL:</th>
      <td style="text-align: center;"><?php 
      $subtotal = 0;
      foreach ($pedido as $item) {
              $subtotal += $item->kgsA  * $item->precioUnitario + $item->kgsB  * $item->precioUnitario;  
            }
            echo $subtotal;
            ?>
          </td> 
        </tr>
        <tr>
          <th colspan="3" style="text-align: right;">IVA 16%:</th> 
          <td></td>
        </tr>
        <tr>
          <th colspan="3" style="text-align: right;">GRAN TOTAL:</th>
          <td style="text-align: center;"> <?php 
          $subtotal = 0;
          foreach ($pedido as $item) {
              $subtotal += $item->kgsA  * $item->precioUnitario + $item->kgsB  * $item->precioUnitario;  
            }
            echo $subtotal;
            ?>
          </td> 
        </tr>
      </table>

      <table> </table>

      <ul class="lista-vertical">
        <li>
          <strong>Terminos de pago:</strong> Por definir
        </li>
        <li>
          <strong>Forma de entrega:</strong> Terrestre
        </li>
        <li>
          <strong>Lugar de embarque:</strong> Teziutlán
        </li>
        <li>
          <strong>Pais de origen:</strong> México
        </li>
        <li>
          <strong>Fecha estimada de entrega:</strong> <?php echo $pedido[0]->fechaEntrega; ?>
        </li>
      </ul>

      <table></table>

      <ul>  
        <li> <strong>COMERCIALIZADORA KETER, S.A. DE C.V.</strong></li>
      </ul>
      <tr>
        <strong>Autorizo:</strong><?php echo $empleado->nombre . '  ' . $empleado->apellidoPaterno . '  ' . $empleado->apellidoMaterno; ?>
    </tr>
  </body>
  </html>
