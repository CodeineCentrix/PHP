
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        // put your code here
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Meter Readings</title>
        <link rel="stylesheet" href="../Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="recordReadings" >
    <div class="MainRes">
        <form action="" method="post">
      <h1>View Water Readings</h1>
      <hr>

<div>
    <b>Duration:</b>
    <select name="duration" value="Duration">    
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly </option>
    </select>
    <br><br>
     
   <label> <strong>From:</strong></label>
<input type="date" name="fromDate">

  <label> <strong>To:</strong></label>
<input type="date" name="toDate">

<table id="table">
  <tr>
    <th>Date</th>
    <th>Reading</th>
    <th>Consumption</th>
  </tr>
</table>
<br>
<label> <strong>Total water used:</strong></label>
<input type="text" name="totWaterUsed">
</div>
    </body>
</div> 
<!--close box container div-->
    </form>
</html>
