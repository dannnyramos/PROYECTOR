<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gráfica de Pedidos</title>
  <style>
    .grafica-pastel {
      width: 30px;
      height: 30px;
    }
    #myChart {
  width: 60px; /* Adjust width as desired */
  height: 60px; /* Adjust height as desired */
}

  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


  <?php foreach ($pedidos as $pedido): ?>
    <h2>Pedido <?php echo $pedido->codigoPedido; ?></h2>
    <canvas id="myChart-<?php echo $pedido->codigoPedido;?>" class="grafica-pastel"></canvas>

    <script>
      var ctx = document.getElementById('myChart-<?php echo $pedido->codigoPedido; ?>').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [
            'Descripción A',
            'Descripción B',
            'Descripción C',
            'Descripción D'
          ],
          datasets: [{
            data: [
              <?php echo $pedido->kgsA; ?>,
              <?php echo $pedido->kgsB; ?>,
              <?php echo $pedido->kgsC; ?>,
              <?php echo $pedido->kgsD; ?>
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
          responsive: true
        }
      });
    </script>
  <?php endforeach; ?>
</body>
</html>