
    <!-- Gráfico -->
    <div class="chart-container">
        <br>
        <h3 style="text-align:center;">  Balance General</h3>
     
        <div id="chart" ></div>
    </div>

    <script>
    const montos = {
      Caja: 2,
      Mercaderia: 4,
      Bienes: 4,
      Deuda: 4,
      Capital: 5,
      Resultados: 1
    };

    const totalDebe = montos.Caja + montos.Mercaderia + montos.Bienes;
    const totalHaber = montos.Deuda + montos.Capital + montos.Resultados;

    const porcentaje = (monto, total) => (monto / total * 100);

    const options = {
      chart: {
        type: 'bar',
        height: 300,
        stacked: true,
        stackType: '100%',
        animations: {
          enabled: true,
          easing: 'easeinout',
          speed: 800
        },
        fontFamily: 'Arial'
      },

      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '90%',
          barHeight: '100%',
        },
      },



      series: [
        { name: `Bienes` ,  data: [porcentaje(montos.Bienes, totalDebe), 0]},
        { name: `Mercadería`, data: [porcentaje(montos.Mercaderia, totalDebe), 0] },
        { name: `Caja`, data: [porcentaje(montos.Caja, totalDebe), 0] },
        { name: `Resultados`, data: [0, porcentaje(montos.Resultados, totalHaber)] },
        { name: `Capital`, data: [0, porcentaje(montos.Capital, totalHaber)] },
        { name: `Deuda`, data: [0, porcentaje(montos.Deuda, totalHaber)] }
      ],
      xaxis: {
        categories: [`DEBE ${totalDebe}`, `HABER ${totalHaber}`],
        labels: {
          style: {
            fontSize: '15px' // 👈 Cambia tamaño de fuente del eje X
          }
        }
      },
      yaxis: {
      labels: {
        style: {
          fontSize: '10px', // Cambia aquí el tamaño
          fontWeight: 'bold' // Opcional
        }
      }
      },

      dataLabels: {
        enabled: true,
        formatter: function (val, opts) {
          const name = opts.w.config.series[opts.seriesIndex].name;
          const isDebe = opts.dataPointIndex === 0;
          const total = isDebe ? totalDebe : totalHaber;
          const monto = (val * total / 100).toFixed(0);
          return `${name}  ${monto} `;
        },
        style: {
          fontSize: '15px', // 👈 Cambia tamaño de fuente de los valores
          fontWeight: 'bold'
        }
      },
      colors: ['#FFC533', '#00DFA2', '#00A3E0', '#7F5A58', '#444444', '#E63946'],
      legend: {
        show: false
      },

      tooltip: {
        y: {
          formatter: function (val, opts) {
            const isDebe = opts.dataPointIndex === 0;
            const total = isDebe ? totalDebe : totalHaber;
            const monto = (val * total / 100).toFixed(0);
            return `S/ ${monto} (${val.toFixed(1)}%)`;
          }
        }
      }
    };

    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>
