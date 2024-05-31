<!DOCTYPE html>
<html>
<head>
    <title>Informe de Resultados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 10px;
        }

        .info span {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
        .columns {
            display: flex;
        }
         .column {
            float: left;
            flex: 1;
            width: 50%;
            box-sizing: border-box;
            padding: 0 10px;
        }

        .info {
            margin-bottom: 10px;
        }

        .info span {
            font-weight: bold;
        }
        .logo {
            width: 250px;
        }
    </style>
</head>
<body>
    <table>
                <tr>
                    <th class="logo" rowspan="8">
                        <img src="<?=base_url('/uploader/image/logoketer.png')?>" alt="Logo de la empresa" width="250px">
                    </th>
                    <td colspan="4" style="text-align: center;">
                       INFORME DE RESULTADOS <?php ?><br>
                    </td>
              </tr>
          </table>

    <div >
        <div class="info" style="text-align: right; margin-top: 30px;">
            <span>FECHA DE RECEPCIÓN Y ANÁLISIS DE MUESTRA:</span> <?php echo $partida[0]->fechaMuestra; ?>
        </div>        
    </div>

    <div class="column">
        <div class="info">
            <span>PARTIDA:</span> <?php echo $partida[0]->partida; ?>
        </div>
        <div class="info">
            <span>PEDIDO:</span> <?php echo $pedidop->pedido; ?>
        </div>
        <div class="info">
            <span>TIPO DE TEJIDO:</span> <?php echo $partida[0]->tipoTejido; ?>
        </div>
        <div class="info">
            <span>COMPOSICIÓN:</span> <?php echo $medida->composicion;?>
        </div>
        <div class="info">
            <span>COLOR:</span> <?php echo  $tono->color . '  ' . $tono->codigo?>
        </div>
        <div class="info">
            <span>FAMILIA:</span> <?php echo  $tono->tonalidad?>
        </div>
    </div>
    <div class="column">
        <div class="info">
            <span>CLIENTE:</span> Comercializadora KETER
        </div>
        <div class="info">
            <span>KG. JERSEY:</span> <?php echo $partida[0]->kgsJersey; ?>
        </div>
        <div class="info">
            <span>KG. RIB:</span> <?php echo $partida[0]->kgsRib; ?>
        </div>
        <div class="info">
            <span>KG. PIQUÉ:</span> <?php echo $partida[0]->kgsPique; ?>
        </div>
        <div class="info">
            <span>ROLLOS JERSEY:</span> <?php echo $partida[0]->totalRollosJersey; ?>
        </div>
        <div class="info">
            <span>ROLLOS RIB:</span> <?php echo $partida[0]->totalRollosRib; ?>
        </div>
    </div>

    <table>
        <tr>
            <th></th>
            <th>REQUERIDO</th>
            <th>REAL</th>
        </tr>
        <tr>
            <th>PESO g/m²</th>
            <td>140 g/m²</td>
            <td><?php echo $partida[0]->pesoReal; ?> g/m²</td>  
        </tr>
        <tr>
            <th>ANCHO (CM)</th>
            <td><?php echo $partida[0]->anchoTotal; ?> CM (TOTAL)</td>
            <td><?php echo $partida[0]->anchoUtil; ?> CM (ÚTIL)</td>
        </tr>
    </table>

    <table>
        <tr>
            <th >PRUEBAS DE TEJIDO</th>
            <th>SDT</th>
            <th>REAL</th>
            <th>RENDIMIENTO</th>
        </tr>
        <tr>
            <td>Estabilidad dimensional al lavado %<br>ANCHO</td>
            <td>-5</td>
            <td> -<?php echo $partida[0]->ancho; ?></td>
            <td ><?php echo $partida[0]->rendimiento; ?> yd/kg </td>
        </tr>
        <tr>
            <td>Estabilidad dimensional al lavado %<br>LARGO</td>
            <td>-5</td>
            <td>-<?php echo $partida[0]->largo; ?></td>
            <td >Total (m) <?php echo $partida[0]->metrosRib; ?></td>   
        </tr>
        <tr>
            <td>% ESPIRALIDAD (TORSIÓN)</td>
            <td>-5</td>
            <td><?php echo $partida[0]->torsion; ?></td>  
            <td >Total (yd) RIB: <?php echo $partida[0]->ydRib; ?></td>         
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td >Total (m) <?php echo $partida[0]->metrosJersey; ?></td> 
        </tr>
        <tr>
            <td>PRUEBAS REALIZADAS EN ROLLO</td>
            <td>#</td>
            <td><?php echo $partida[0]->noRollo; ?></td>  
            <td>Total (yd) JERSEY:<?php echo $partida[0]->ydJersey; ?></td>         
        </tr>
    </table>
</body>
</html>