<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Estado de Cambios en el Patrimonio</title>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <style>
    #chart-patrimonio {
      max-width: 600px;
      margin: auto;
    }
  </style>
</head>
<body>

<div id="chart-patrimonio"></div>

<script>
  const categorias = [
    'Saldo Inicial',
    'Aumento de Capital',
    'Dividendos',
    'Utilidades del Ejercicio',
    'Pérdidas del Ejercicio'
  ];

  const valores = [3, 4, 2, 2, 1];

  const total = valores.reduce((acc, val) => acc + val, 0);
  const porcentajes = valores.map(val => Math.round((val / total) * 100));

  const colores = ['#00E396', '#008FFB', '#FF4560', '#FEB019', '#775DD0'];

  const options = {
    series: [{
      data: valores
    }],
    chart: {
      id: 'barPatrimonio',
      height: 400,
      width: '100%',
      type: 'bar'
    },
    plotOptions: {
      bar: {
        horizontal: true,
        barHeight: '75%',
        distributed: true,
        dataLabels: {
          position: 'bottom'
        }
      }
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'start',
      style: {
        colors: ['#000']  // Texto en negro
      },
      formatter: function (val, opt) {
        const label = categorias[opt.dataPointIndex];
        const porcentaje = porcentajes[opt.dataPointIndex];
        return `${porcentaje}% ${label} ${val}`;
      },
      offsetX: 0,
      dropShadow: {
        enabled: false
      }
    },
    colors: colores,
    tooltip: {
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function (_, opts) {
            return categorias[opts.dataPointIndex];
          }
        }
      }
    },
    title: {
      text: 'Estado de Cambios en el Patrimonio',
      offsetX: 15
    },
    yaxis: {
      categories: categorias,
      labels: {
        style: {
          colors: '#000'
        }
      }
    },
    xaxis: {
      title: {
        text: 'Montos'
      },
      labels: {
        style: {
          colors: '#000'
        }
      }
    },
    legend: {
      show: false // Ocultamos la leyenda porque ya está claro en los datos
    }
  };

  const chart = new ApexCharts(document.querySelector("#chart-patrimonio"), options);
  chart.render();
</script>

</body>
</html>
