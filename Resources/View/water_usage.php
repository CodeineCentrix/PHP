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
        <style>
            html{
                overflow-y:  auto;
            }
        </style>
    </head>
    <body>
        <?php include '../Resources/View/header.php'; ?>
        <!-- Date inputs-->
        <div class="wrap_usage_area">
            <div class="date_wrapper">
                <div class="date_control_wrapper">
                <form action="MainController.php?action=water_usage_custom" method="POST">
                <h3>Generate your own custom graph</h3>
                <div class="date_control" required> <label>Your start date:  </label> <br>  <input type="date" name="min_date"> </div>
                <div class="date_control" required> <label> Your end date: </label><br> <input type="date" name="max_date"></div>
                <div class="button_wrapper"> <input type="submit" value="Generate Graph"></div>
            </form>
            </div>
        </div>
        
        <!-- The graph -->
        <div class="graph-wrapper">
            <div id="graphArea">
                
            </div>
        </div>
        </div>
        <?php
        $records = count($readings);
        if($records>=2): ?>
        <!-- If there is data that is returned and is sufficient to create a graph --> 
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Consumption'],
          
          <?php 
          $row = -1; 
          $count =-1;
          foreach ($readings as $value): 
              ?>
          
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
          echo $todays- $yesterdays;
            }
            $count++;
            ?>],
          
          
          
          <?php endforeach; ?>
        ]);

         var options = {
        title: 'Your water consumption: <?php echo $_SESSION['HouseNumber']." ".$_SESSION['StreetName']." Street";?>',
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
        <p>You only have <?php echo "$records"; ?> which isn't enough for us to formulate a proper graph. </p>
        <p>Tasks to help: <a href="../Controller/MainController.php?action=add_reading">Add some meter readings?</a></p>
    </div>
    <?php endif;?>
    </body>
</html>
