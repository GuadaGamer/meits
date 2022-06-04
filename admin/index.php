<?php
    require_once('../class/meits.class.php');
    $Meits->validatePermiso('Agregar');
    include("view/header.php");
?>
<h1>Bienvenido al sistema.</h1>
    <script type="text/javascript">
        <?php print_r($miembros); ?>
       //Load the Visualization API and the corechart package.
//      google.charts.load('current', {'packages':['corechart']});
//
//      // Set a callback to run when the Google Visualization API is loaded.
//      google.charts.setOnLoadCallback(drawChart);
//
//      // Callback that creates and populates a data table,
//      // instantiates the pie chart, passes in the data and
//      // draws it.
//      function drawChart() {
//
//        // Create the data table.
//        var data = new google.visualization.DataTable();
//        data.addColumn('string', 'Topping');
//        data.addColumn('number', 'Slices');
//        data.addRows([
//            <?php
//            foreach($miembros as $miembro): ?>
//            <?php $miembros_detalles = $Usuario->readOne($miembro['id_usuario']); ?>
//            <?php //foreach($miembros_detalles as $miembro_detalle): ?>
//            ["<?php //echo $miembro['nombre']; ?>"
//            <?php //endforeach; ?>
//            <?php //endforeach; ?>
//        ]);
//
//        // Set chart options
//        var options = {'title':'Cuantos miembros hay en Meits',
//                       'width':1000,
//                       'height':600};
//
//        // Instantiate and draw our chart, passing in some options.
//        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
//        chart.draw(data, options);
//      }
    </script>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </body>
</html>