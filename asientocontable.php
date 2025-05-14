<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asiento Codex Contable</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #ffffff;
      margin: 0;
      padding: 30px;
      display: flex;
      justify-content: center;
    }

    .asiento-codex {
      background: #ffffff;
      border: 2px solid #dcdde1;
      border-radius: 15px;
      padding: 25px;
      width: 100%;
      max-width: 700px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #2d3436;
      font-size: 26px;
      margin-bottom: 10px;
    }

    .asiento-numero {
      text-align: center;
      font-size: 18px;
      color: #0984e3;
      margin-bottom: 10px;
    }

    .fecha {
      text-align: center;
      font-size: 16px;
      color: #636e72;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    th {
      background: #dfe6e9;
      color: #2d3436;
      padding: 10px;
      border-bottom: 2px solid #b2bec3;
    }

    td {
      padding: 10px;
      border-bottom: 1px solid #dcdde1;
      font-size: 15px;
      text-align: center;
    }

    .debe {
      color: #00b894;
      font-weight: bold;
    }

    .haber {
      color: #d63031;
      font-weight: bold;
    }

    .glosa {
      font-style: italic;
      background-color: #f1f2f6;
      padding: 12px;
      border-radius: 10px;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="asiento-codex">
  <h1>📘 Asiento Codex Contable</h1>
  <div class="asiento-numero">🧾 Asiento Nº: 004</div>
  <div class="fecha">📅 Fecha: 12/05/2025</div>

  <table>
    <tr>
      <th>N° Cuenta</th>
      <th>Cuenta</th>
      <th>Debe (S/)</th>
      <th>Haber (S/)</th>
    </tr>
    <tr>
      <td>101</td>
      <td>🎁 Caja mágica</td>
      <td class="debe">1,500.00</td>
      <td></td>
    </tr>
    <tr>
      <td>311</td>
      <td>🦄 Aporte del Socio Legendario</td>
      <td></td>
      <td class="haber">1,500.00</td>
    </tr>
  </table>

  <div class="glosa">
    ✍️ Glosa: Se registró el ingreso mágico del nuevo socio contable para aventuras futuras 🎲📚
  </div>
</div>

</body>
</html>
