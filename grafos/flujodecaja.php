
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <style>
    #chart-flujo {
      max-width: 800px;
      margin: auto;
    }
    .leyenda {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      font-family: sans-serif;
      font-size: 16px;
    }
    .leyenda-item {
      display: flex;
      align-items: center;
      margin: 0 15px;
    }
    .color-box {
      width: 16px;
      height: 16px;
      margin-right: 8px;
      border-radius: 3px;
    }
    .ingresos { background-color: #00E396; }
    .egresos { background-color: #FF4560; }
  </style>

<h2 style="text-align:center;">Flujo de Caja - Ingresos y Egresos</h2>
<div id="chart-flujo"></div>

<!-- Leyenda personalizada -->
<div class="leyenda">
  <div class="leyenda-item">
    <div class="color-box ingresos"></div> Ingresos
  </div>
  <div class="leyenda-item">
    <div class="color-box egresos"></div> Egresos
  </div>
</div>

<script>
  const categorias = [
    'Ventas de Mercaderías',
    'Ventas de Bienes',
    'Préstamos Obtenidos',
    'Capital Obtenido',
    'Compra de Mercadería',
    'Compra de Bienes',
    'Pagos Adelantados',
    'Pagos de Préstamos',
    'Préstamos Otorgados',
    'Reparto de Utilidades',
    'Gastos Diversos'
  ];

  const valores = [8, 3, 2, 5, 6, 2, 5, 15, 10, 12, 8];

  const total = valores.reduce((acc, val) => acc + val, 0);
  const porcentajes = valores.map(val => Math.round((val / total) * 100));

  const colores = [
    ...Array(4).fill('#00E396'), // INGRESOS
    ...Array(7).fill('#FF4560')  // EGRESOS
  ];

  const options = {
    series: [{
      data: valores
    }],
    chart: {
      height: 500,
      type: 'bar',
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        distributed: true,
        dataLabels: { position: 'bottom' }
      }
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'start',
      style: { colors: ['#000'] },
      formatter: function (val, opt) {
        const etiqueta = categorias[opt.dataPointIndex];
        const porcentaje = porcentajes[opt.dataPointIndex];
        return `${porcentaje}% ${etiqueta} S/${val}`;
      },
      offsetX: 0,
      dropShadow: { enabled: true }
    },
    colors: colores,
    legend: { show: false },
    title: {
      text: 'Flujo de Caja Simplificado',
      align: 'left'
    },
    xaxis: {
      title: { text: 'Montos (S/.)' }
    },
    yaxis: {
      categories: categorias
      
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return `S/${val}`;
        }
      }
    }
  };

  const chart = new ApexCharts(document.querySelector("#chart-flujo"), options);
  chart.render();
</script>

