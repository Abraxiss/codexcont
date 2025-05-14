
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <style>
    #chart-year {
      max-width: 600px;
      margin: auto;
    }

    .custom-legend {
      max-width: 600px;
      margin: 20px auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      font-family: Arial, sans-serif;
    }

    .legend-item {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .legend-color {
      width: 12px;
      height: 12px;
      border-radius: 2px;
    }
  </style>


<div id="chart-year"></div>

<!-- Leyenda personalizada -->
<div class="custom-legend" id="custom-legend"></div>

<script>
  const categories = [
    'Ventas',
    'Costos',
    'Resultado Bruto',
    'Gastos',
    'Resultado Neto'
  ];

  const values = [15, 5, 10, 4, 6];
  const total = values.reduce((acc, val) => acc + val, 0);
  const percentages = values.map(val => Math.round((val / total) * 100));
  const colors = ['#00E396', '#FEB019', '#775DD0', '#FF4560', '#008FFB'];

  // Configurar gráfico
  const options = {
    series: [{
      data: values.map((val, index) => ({
        x: categories[index],
        y: val
      }))
    }],
    chart: {
      id: 'barYear',
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
        colors: ['#fff']
      },
      formatter: function (val, opt) {
        const percentage = percentages[opt.dataPointIndex];
        const label = categories[opt.dataPointIndex];
        return `${percentage}% ${label} ${val}`;
      },
      offsetX: 0,
      dropShadow: {
        enabled: true
      }
    },
    colors: colors,
    tooltip: {
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function (_, opts) {
            return categories[opts.dataPointIndex];
          }
        }
      }
    },
    title: {
      text: 'Estado de Resultados',
      offsetX: 15
    },
    yaxis: {
      categories: categories,
      labels: {
        show: true,
            style: {
      colors: '#000000',  // Cambia aquí el color del eje Y
    }
      }
    },
    xaxis: {
      title: {
        text: 'Montos'
      }
    },
    legend: {
      show: false
    }
  };

  const chart = new ApexCharts(document.querySelector("#chart-year"), options);
  chart.render();

  // Crear leyenda personalizada
  const legendContainer = document.getElementById('custom-legend');
  categories.forEach((cat, i) => {
    const item = document.createElement('div');
    item.className = 'legend-item';
    item.innerHTML = `
      <div class="legend-color" style="background-color: ${colors[i]}"></div>
      <span>${cat}</span>
    `;
    legendContainer.appendChild(item);
  });
</script>
