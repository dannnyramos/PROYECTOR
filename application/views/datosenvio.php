        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reporte de Partida</title>
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
                ul {
                    list-style-type: none;
                    padding: 30;
                }
                ul li {
                    border-bottom: 1px solid #ccc;
                    padding: 5px;
                }
            </style>
        </head>
        <body>
            <table>
                <tr>
                    <th class="logo">
                        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
                    </th>
                    <td colspan="3" style="text-align: center;">
                      PLANTA DE TEÑIDO Y ACABADO <?php ?><br>
                      Camino al Carrizal S/N Barrio de Atoluca KM #6 Carretera a Nautla, Teziutlán; Puebla<?php ?><br>
                  </td>
              </tr>
          </table>
          <table>
            <tr class="info-section">
                <td colspan="3" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">Tabulador de rollos</td>
            </tr>
        </table>
        <table>
          <th colspan="1" style="width: 33%;">
            <h2>Pedido: <?php echo $pedidop->pedido; ?></h2>
        </th>
        <td colspan="2" style="text-align: center; width: 33%;">
            Confección:KETER <?php ?><br>
            Calle Prof. Alfredo Castillo Ávila No. 23 <?php ?><br>
            Barrio de Chignaulingo, Teziutlán, Puebla <?php ?><br>
        </td>
        <td>Fecha : <?php echo $partida[0]->fechaMuestra;?></td>
    </table>

    <table>
        <td colspan="1" style="width: 33%;">Hilo: <?php echo $hilo->hilo; ?></td>
        <td colspan="2" style="text-align: center; width: 33%;">Mezcla: <?php echo $medida->composicion;?> </td>
        <td>Total, kg: <?php echo $partida[0]->totalKgsF; ?></td>
    </table>
    <table>
        <td colspan="1" style="width: 33%;">Color:</td>
        <td colspan="2" style="text-align: center; width: 33%;">Total de rollos:</td>
        <td>Total M: <?php 
        $metros = 0;
        foreach ($partida as $item) {
            $metros += $item->metrosJersey + $item->metrosRib;  
        }
        echo $metros;
    ?></td>
</table>
<table>
    <td colspan="1" style="width: 33%;"><?php echo  $tono->color . '  ' . $tono->codigo?></td>
    <td colspan="2" style="text-align: center; width: 33%;"><?php echo $partida[0]->totalRollos; ?></td>
    <td>Total Yd: <?php 
    $yardas = 0;
    foreach ($partida as $item) {
        $yardas += $item->ydJersey + $item->ydRib;  
    }
    echo $yardas;
?></td>
</table>

<table>
    <td colspan="1" style="width: 25%;">Ancho total: <?php echo $partida[0]->anchoTotal; ?> </td>
    <td colspan="2" style="width: 25%;">Ancho Util: <?php echo $partida[0]->anchoUtil; ?></td>
    <td colspan="1" style="text-align: center; width: 25%; "><?php echo $partida[0]->partida; ?></td> 
    <td colspan="1" style="width: 25%;">Peso acabado:<?php echo $partida[0]->pesoReal;?> g/m2</td>
</table>

<table>
    <tr>
        <th>No.Rollo</th>
        <th>Tipo Tela</th>
        <th>Metros</th>
        <th>Yardas</th>
        <th>Kilos</th>
        <th>Comentarios</th>
    </tr>
    <?php $contadorRollo = 1; 
    foreach ($informacionPartida as $row) { ?>
        <tr>
            <td><?php echo $contadorRollo++; ?></td>
            <td><?php echo $row->tipoTela; ?></td>
            <td><?php echo $row->metros; ?></td>
            <td><?php echo $row->yardas; ?></td>
            <td><?php echo $row->KgFinal; ?></td>
            <td><?php echo $row->comentarios; ?></td>
        </tr>
    <?php } ?>
</table>

</table>
<br>
<table >
    <tr>
        <th>Entrego</th>
        <th>Recibio</th>
    </tr>
    <tr> 
        <td colspan="1" style="text-align: center;width: 50%;"><?php echo $partida[0]->entrego; ?></td>
        <td colspan="1" style="text-align: center;width: 50%;"><?php echo $partida[0]->recibio; ?></td>
    </tr>
</table>
</body>
</html>
