<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Pedido</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos para hacer la gráfica más pequeña */
        .chart-container {
            width: 50%;
            height: auto;
            margin: 0 auto;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    th, td {
        padding: 8px 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e6e6e6;
    }
    h1, h2 {
        font-family: Arial, sans-serif;
        text-align: center;
        margin-bottom: 5px;
    }

    h1 {
        font-size: 32px;
        color: #333;
    }

    h2 {
        font-size: 24px;
        color: #666;
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
    <h1>Pedido</h1>

    <?php if (isset($pedido) && is_object($pedido)): ?>
        
        <h2> <?php echo $pedido->pedido; ?></h2>
        <div class="chart-container">
            <canvas id="chart-<?php echo $pedido->codigoPedido; ?>"></canvas>
        </div>
        <table>
            <tr>
                <th>Fecha de Activación</th>
                <td><?php echo $pedido->fechaActivacion; ?></td>
            </tr>
            <tr>
                <th>Estatus pedido</th>
                <td><?php echo $pedido->estatus; ?></td>
            </tr>
            <tr>
                <th>Estado del proceso de teñido</th>
                <td><?php echo $pedido->proceso; ?></td>
            </tr>
            <tr>
                <th>Kilogramos Entregados</th>
                <td><?php echo $pedido->kgsEntregados; ?></td>
            </tr>
            <tr>
                <th>Fecha de Entrega</th>
                <td><?php echo $pedido->fechaEntrega; ?></td>
            </tr>
        </table>
        <script>
            var ctx = document.getElementById('chart-<?php echo $pedido->codigoPedido; ?>').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        '<?php echo $pedido->descripcionA; ?>',
                        '<?php echo $pedido->descripcionB; ?>'
                    ],
                    datasets: [{
                        data: [
                            <?php echo $pedido->kgsA; ?>,
                            <?php echo $pedido->kgsB; ?>
                            ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Permite que la gráfica se ajuste al tamaño del contenedor
                }
            });
        </script>
    <?php else: ?>
        <p>No se encontró el pedido.</p>
    <?php endif; ?>
</body>
</html>