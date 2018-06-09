<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Water Usage</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php include '../Resources/View/header.php'; ?>
        <!-- Date inputs-->
        <div>
            <div>
                <form action="MainController.php?action=water_usage_custom" method="POST">
                <p>Generate your own custom graph</p>
                <label> Your start date:  <input type="date" name="min_date"> </label>
                <label> <input type="date" name="max_date"></label>
                <div> <input type="submit"></div>
            </form>
            </div>
        </div>
        
        <!-- The graph -->
        <div>
            <div id="graphArea">
                
            </div>
        </div>
        <?php
        if(1==1): ?>
        <!-- If there is data that is returned and is sufficient to create a graph --> 
            <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Consumption'],
          
          <?php 
          $row = -1;         
          foreach ($readings as $value): 
              ?>
          
         // ['2004',  1000], how the format should look like
          ['<?php  
          $dateAsString = date_format($value[0], 'd M');
      echo $dateAsString;
          
          ?>',
          
          
            <?php 
             if($count===-1){
          $todays = $value[1];
          $yesterdays = $value[1];
          echo $todays- $yesterdays;
            }else{
          $todays = $value[1];        
          $yesterdays = $readings[$count][1];
          $amount+= $todays- $yesterdays;
          echo $todays- $yesterdays;
            }
            $count++;
            ?>],
          
          
          
          <?php endforeach; ?>
        ]);

         var options = {
        title: 'Your water consumption',
        curveType: 'function',
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Consumption(litres)'
        }
      };

        var chart = new google.visualization.LineChart(document.getElementById('graphArea'));

        chart.draw(data, options);
      }
    </script>
        <?php else:?>
    <!-- If there isn't data returned or it isn't sufficient to create a graph -->
    <div>
        <p>There isn't enough data to generate the graph for you.</p>
        <p><a>Add some meter readings?</a></p>
    </div>
    <?php endif;?>
    </body>
</html>
