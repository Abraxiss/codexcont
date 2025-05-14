<!DOCTYPE HTML>
<html>

<?php include("../../data/conexion.php"); ?>



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
        text: ' RESULTADOS 2'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'IMPORTE : <b>{point.y}</b><br/>' +
            'PARTICIPACION : <b>{point.z}</b><br/>'
    },







    <?php 
    $query=
"SELECT plan.ALCANCE, Sum(diario.SALDO) AS SumaDeSALDO
FROM diario INNER JOIN plan ON diario.CTA = plan.CTA
GROUP BY plan.ALCANCE, diario.User
HAVING (((plan.ALCANCE)=1) AND ((diario.User)=1))";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result);
$TOTAL= $filas ['SumaDeSALDO'];


    $query2=
"SELECT diario.NOMBRE, Sum(diario.SALDO) AS COSTOS, diario.ACT, plan.ALCANCE, diario.User, diario.CTA1
FROM diario INNER JOIN plan ON diario.CTA = plan.CTA
GROUP BY diario.NOMBRE, diario.ACT, plan.ALCANCE, diario.User, diario.CTA1
HAVING (((plan.ALCANCE)=3) AND ((diario.User)=1) AND ((diario.CTA1)<>7))";
$result2=mysqli_query($conexion, $query2);

    $query3=
"SELECT plan.ALCANCE, Sum(diario.SALDO) AS UTILIDAD
FROM diario INNER JOIN plan ON diario.CTA = plan.CTA
GROUP BY plan.ALCANCE, diario.User
HAVING (((plan.ALCANCE)=3) AND ((diario.User)=1))";
$result3=mysqli_query($conexion, $query3);

    ?>



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
            y: <?php echo $filas2 ['COSTOS'];  ?>,
            z:  <?php echo round($filas2 ['COSTOS'] / $TOTAL * 100 , 2) ?> + '%',
            },

       <?php } ?>

            {
            name:'UTILIDAD  ' ,
            y: <?php echo -1 * $filas3 ['UTILIDAD'];  ?>,
            z:  23,
            },

        ]


    }]

});

		</script>
	</body>
</html>
