<!DOCTYPE HTML>
<html>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <!-- FUENTES ICONOS LOCAL -->
    <link rel="stylesheet" href="./../style.css">
    <link rel="stylesheet" href="stylos/stylosmenu.css">
    <?php include("../../data/conexion.php"); ?>
<?php include("../../session/sessionup.php"); ?>

    <?php 
    $query=
    "SELECT plan.ALCANCE, Sum(diario.SALDO) AS SumaDeSALDO
FROM diario INNER JOIN plan ON diario.CTA = plan.CTA
GROUP BY plan.ALCANCE, diario.User
HAVING (((plan.ALCANCE)=1) AND ((diario.User)=$user_up))";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result);
$TOTAL= $filas ['SumaDeSALDO'];

    $query2=
"SELECT diario.NOMBRE, Sum(diario.SALDO) AS SumaDeSALDO, diario.ACT, plan.ALCANCE, diario.User
FROM diario INNER JOIN plan ON diario.CTA = plan.CTA
GROUP BY diario.NOMBRE, diario.ACT, plan.ALCANCE, diario.User
HAVING (((plan.ALCANCE)=1) AND ((diario.User)=$user_up))";

    $result2=mysqli_query($conexion, $query2);

    ?>


	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ACTIVO</title>

		<style type="text/css">
#container {
	height: 500px;
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 700px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>
	</head>
	<body>

<table class="table table-bordered text-center ">
  <thead class="thead-light ">
    <tr>
    <th scope="col"> <h4>  <?php echo  $TOTAL ?>  UM• </h4></th>
    </tr>
  </thead>
</table>

<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/variable-pie.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>
<script src="../../code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">

    </p>
</figure>


		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'variablepie'
    },
    title: {
        text: '  A C T I V O'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'IMPORTE : <b>{point.y}</b><br/>' +
            'PARTICIPACION : <b>{point.z}</b><br/>'
    },





    series: [{
        minPointSize: 60,
        innerSize: '60%',
        zMin: 0,
        name: 'countries',
        data: 
        [

            <?php while($filas2=mysqli_fetch_assoc($result2))  { ?>
            {
            name:'<?php echo $filas2 ['NOMBRE'] ; ?> ' ,
            y: <?php echo $filas2 ['SumaDeSALDO'];  ?>,
            z:  <?php echo round($filas2 ['SumaDeSALDO'] / $TOTAL * 100 , 2) ?> + '%',
            },

       <?php } ?>

        ]


    }]

});

		</script>



	</body>
</html>
