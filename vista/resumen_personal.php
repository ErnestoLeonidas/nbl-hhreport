<?php
session_start();
$id_activo = $_SESSION['usuario_activo'][0]['ID_USUARIO']; 
$hh_mes = $_SESSION['hh_mes'];
$especialidad = $_SESSION['especialidades'];
$proyectos_activos = $_SESSION['proyectos_activos'];
$localidades = $_SESSION['localidades'];
$solicitantes = $_SESSION['solicitantes'];
  $resumen = $_SESSION['resumen'];
?>

<!-- carga el head y el navegador -->
<?php include_once('cargahh-trabajador.php'); ?>


<script type="text/javascript" src="../asset/js/loader.js"></script>



<div class="container">
<div id="donutchart" style="width: 900px; height: 500px;"></div>
<div id="barchart_material" style="width: 900px; height: 500px;"></div>
</div>








<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([

      ['Task', 'Hours per Day'],
    <?php foreach($resumen as $r){ ?>

      ['<?php echo utf8_encode(ucfirst($r['PROYECTO'])) ?>',     <?php echo $r['HH'] ?>],

    <?php } ?>  
    ]);

    var options = {
      title: 'HH DEL MES - <?php echo $resumen[0][1] ?>',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['PROYECTO', 'HH'],
          <?php foreach($resumen as $r){ ?>
            ['<?php echo utf8_encode(ucfirst($r['PROYECTO'])) ?>', <?php echo $r['HH'] ?>],
          <?php } ?>  
        ]);

        var options = {
          chart: {
            title: 'Resumen de HH',
            subtitle: 'Proyectos usados en el mes',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


<?php include_once('modal_agregar.php'); ?>
<!-- carga el footer y los script generales como el reloj -->
<?php include_once('footer.php'); ?>
