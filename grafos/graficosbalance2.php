<div class="text-center p-2">
  <h4 class="fw-bold">Balance General</h4>
</div>



<div id="chart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Declaramos los montos
  const montos = {
    Caja: 2,
    Mercaderia: 4,
    Bienes: 4,
    Deuda: 5,
    Capital: 3,
    Resultados: 2
  };

  const options = {
    chart: {
      type: 'bar',
      height: 400
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '60%',
        dataLabels: {
          position: 'top'
        }
      }
    },
    dataLabels: {
      enabled: true,
      formatter: val => `S/ ${val}`
    },
    stroke: {
      show: true,
      width: 1,
      colors: ['#fff']
    },
    series: [
      {
        name: 'Caja',
        data: [montos.Caja, 0]
      },
      {
        name: 'Mercadería',
        data: [montos.Mercaderia, 0]
      },
      {
        name: 'Bienes',
        data: [montos.Bienes, 0]
      },
      {
        name: 'Deuda',
        data: [0, montos.Deuda]
      },
      {
        name: 'Capital',
        data: [0, montos.Capital]
      },
      {
        name: 'Resultados',
        data: [0, montos.Resultados] // Negativo si lo quieres así
      }
    ],
    xaxis: {
      categories: ['DEBE', 'HABER'],
      title: {
        text: 'Partida Doble'
      }
    },
    yaxis: {
      title: {
        text: 'Monto (S/.)'
      },
      labels: {
        formatter: val => `S/ ${val}`
      }
    },
    tooltip: {
      y: {
        formatter: val => `S/ ${val}`
      }
    },

    colors: [
      '#FFD700', // Bienes (amarillo)
      '#FF69B4', // Mercadería (rosa)
      '#32CD32', // Caja (verde)
      '#1E90FF', // Resultados (azul)
      '#000000', // Capital (negro)
      '#FFA500'  // Deuda (naranja)
    ],

  };

  const chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>
