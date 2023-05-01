<?php
    include_once "header.php";
?>




    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Genre', 'Number of books'],
          ['Action',     11],
          ['Adventure',      2],
          ['Drama',  2],
          ['Mystery', 2],
          ['Comedy',    7]
        ]);

        var options = {
          title: 'To-read'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <div id="piechart" style="width: 900px; height: 500px;"></div>


