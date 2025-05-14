<div class="text-center p-2">
  <h4 class="fw-bold">Balance General</h4>
</div>

 <div id="chart"></div>

  <script>
    const montos = {
      Caja: 2,
      Mercaderia: 4,
      Bienes: 4,
      Deuda: 5,
      Capital: 3,
      Resultados: 2
    };

    const totalDebe = montos.Caja + montos.Mercaderia + montos.Bienes;
    const totalHaber = montos.Deuda + montos.Capital + montos.Resultados;

    const porcentaje = (monto, total) => (monto / total * 100);

    const options = {
      chart: {
        type: 'bar',
        height: '60%' , // Hace que se adapte al contenedor
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
          columnWidth: '90%' // 👈 Ajusta el ancho de las barras aquí
          //distributed: true // 🔑 Esto permite colores individuales por barra
        }
      },
      series: [
        { name: `Bienes`, data: [porcentaje(montos.Bienes, totalDebe), 0] },
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
            fontSize: '12px' // 👈 Cambia tamaño de fuente del eje X
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
          return `${name} ${monto} `;
        },
        style: {
          fontSize: '12px', // 👈 Cambia tamaño de fuente de los valores
          fontWeight: 'bold'
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
