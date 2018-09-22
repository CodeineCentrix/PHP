<div>
     <h1 style="text-align: center;">Water Usage per Suburb</h1> <hr>
     <br><h3>Pick a city, then click search to see wealth of information below: </h3><br>
     <div style="margin: auto; width: 30%;padding: 80px;">
     <form method="POST" action="?action=city_usage">
         <label>Pick a city:</label>
         <select name="cities" required>
             <option></option>
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo "$city[0]"; ?>"> <?php echo"$city[1]";?> </option>  
        <?php endforeach; ?>   
         </select><br>
         <input type="submit" value="Search City">
     </form>
     </div>
    <?php if(isset($user_city)): ?>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <!--start graph-->
     <div class="graph-wrapper">
         <div id="graphArea">
             <script type="text/javascript">
             google.charts.load('current', {'packages':['corechart']});
             google.charts.setOnLoadCallback(drawChart);
    //function or method that creates a graph structure
            function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Suburb', 'Consumption'],
          <?php foreach ($city_data as $city):?>
          ['<?php echo $city[0]; ?>',
          <?php echo $city[1]?>],
          <?php endforeach; ?>
          
         ]);
         
         var options = {
        title: 'Water consumption per suburb in your selected city',
              
    vAxis: {
          title: 'Consumption(Kilolitres)'
        },
        
        hAxis: {
          title: 'Suburb'
        }

      };

        var chart = new google.visualization.LineChart(document.getElementById('graphArea'));
  //var chart = new google.visualization.PieChart(document.getElementById('graphArea'));
        chart.draw(data, options);
        
        }
             
             </script> 
         </div>
     </div>
     <!--end graph-->
     <?php else: ?>
     <p>Your graph will appear here once you've picked a city. </p>
    <?php endif; ?>
</div>