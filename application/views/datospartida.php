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
                      TEJIDO PLANTA IXTLAHUACA <?php ?><br>
                      Avenida Manuel Avila Camacho No.17 Barrio de Ixtlahuaca <?php ?><br>
                      C.P. 73968 Teziutlán Puebla <?php ?><br>
                  </td>
              </tr>
          </table>
          <table>
              <tr class="info-section">
                <td colspan="2" style="text-align: center; background-color: #CCCCCC; box-shadow: 2px 2px 5px #888888;">PARTIDA: <?php echo $partida[0]->partida; ?></td>
                <td colspan="2" style="text-align: center; width: 50%;">Estatus : <?php echo $partida[0]->estatus;?>
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
               ACABADO: KETER CARRIZAL <?php ?><br>
               Camino a Atoluca No. 6. Atoluca <?php ?><br>
               C.P. 73967 Teziutlán Puebla <?php ?><br>
           </td>
           <td>Fecha : <?php echo $partida[0]->fecha;?></td>
        </table>

        <table>
            <td colspan="1" style="width: 33%;">Hilo: <?php echo $hilo->hilo; ?></td>
            <td colspan="2" style="text-align: center; width: 33%;">Mezcla: <?php echo $medida->composicion;?> </td>
            <td>Proveedor: <?php echo $hilo->proveedor; ?></td>
        </table>
        <table>
            <td colspan="1" style="width: 33%;">Diámettro: <?php echo $partida[0]->diametro; ?></td>
            <td colspan="2" style="text-align: center; width: 33%;">Color: <?php echo  $tono->color . '  ' . $tono->codigo?></td>
            <td>Total de rollos: <?php echo $partida[0]->totalRollos; ?></td>
        </table>
        <table>
            <td colspan="1" style="width: 25%;">LM: <?php echo $medida->LMJersey;?></td>
            <td colspan="2" style="width: 25%;">Lotes: <?php echo implode(', ', array_column($lote, 'lote')); ?> </td>
            <td colspan="1" style="width: 25%;">LM: <?php echo $medida->LMRib;?></td>  
            <td colspan="1" style="width: 25%;">Total, kg: <?php echo $partida[0]->totalKgs; ?></td> 
        </table>
        <table>
            <td colspan="1" style="text-align: center;width: 50%;">JERSEY</td>
            <td colspan="1" style="text-align: center;width: 50%;"> <?php echo $partida[0]->telaRib; ?></td>

               <!-- <td colspan="1" style="text-align: center;width: 50%;"><?php echo (count(explode(",", $partida[0]->tela)) > 1) ? explode(",", $partida[0]->tela)[0] : $partida[0]->tela; ?></td>
                <td><?php echo (count(explode(",", $partida[0]->tela)) > 1) ? explode(",", $partida[0]->tela)[1] : ""; ?></td>-->
            </table>

            <table>
                <td colspan="1" style="width: 25%;">Ancho acabado real: <?php echo $partida[0]->anchoTotal; ?> </td>
                <td colspan="2" style="width: 25%;">Peso acabado: <?php echo $medida->pesoAcabadoJersey;?> </td>
                <td colspan="1" style="width: 25%;">Ancho Util: <?php echo $partida[0]->anchoUtil; ?></td>  
                <td colspan="1" style="width: 25%;">Peso acabado:<?php echo $medida->pesoAcabadoRib;?></td>
            </table>
            <table>
                <td colspan="1" style="width: 25%;">Encogimiento: +-5% en ambos sentidos </td>
                <td colspan="2" style="width: 25%;"> <?php echo $partida[0]->notaJersey; ?></td> 
                <td colspan="1" style="width: 25%;">Encogimiento: +-5% </td>  
                <td colspan="1" style="width: 25%;"> <?php echo $partida[0]->notaRib; ?></td>
            </table>



<table>
        <tr>
            <th>Código</th>
            <th>Peso Rollo</th>
            <th>Tipo Tela</th>
        </tr>
        <?php foreach ($informacionPartida as $row) { ?>
            <tr>
                <td><?php echo $row->codigo; ?></td>
                <td><?php echo $row->KgInicial; ?></td>
                <td><?php echo $row->tipoTela; ?></td>
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
