<div id="chart-year" class="chart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Datos base del estado de resultados
  const dataEstadoResultados = [
    { label: "Ventas", value: 15 },
    { label: "Costos", value: 5 },
    { label: "R. Bruto", value: 10 },
    { label: "Gastos", value: 4 },
    { label: "R. Neto", value: 11 }
  ];

  // Colores por categoría
  const colores = ['#008FFB', '#FF4560', '#00E396', '#FEB019', '#775DD0'];

  const options = {
    series: [{
      data: dataEstadoResultados.map(item => item.value)
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
        distributed: true,
        barHeight: '75%',
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
        return dataEstadoResultados[opt.dataPointIndex].label + ": S/ " + val;
      },
      offsetX: 0,
      dropShadow: {
        enabled: true
      }
    },
    colors: colores,
    xaxis: {
      categories: dataEstadoResultados.map(item => item.label),
      title: {
        text: 'Monto (S/.)'
      }
    },
    yaxis: {
      labels: {
        show: false
      }
    },
    tooltip: {
      y: {
        formatter: function (val, opts) {
          return "S/ " + val;
        }
      }
    },
    title: {
      text: 'Estado de Resultados',
      offsetX: 15
    },
    subtitle: {
      text: '(Datos contables clave)',
      offsetX: 15
    }
  };

  const chart = new ApexCharts(document.querySelector("#chart-year"), options);
  chart.render();
</script>
