
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
        <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="recordReadings" >
       <?php include '../Resources/View/header.php'; ?>
    <div class="MainRes">
        <form action="MainController.php?action=view_readings" method="post">
      <h1>View Water Readings</h1>
      <hr>

<div>
<!--    <b>Duration:</b>
    <select name="duration" value="Duration">    
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly </option>
    </select>
    <br><br>-->
     <h2 class="displayInfoToUser"><?php echo "$house[0]"." $house[1]"; ?></h2>
     
   <label> <strong>From:</strong></label>
   <input type="date" required name="fromDate">

  <label> <strong>To:</strong></label>
  <input type="date" required name="toDate">
  <div class="warning"><br><label>Readings &amp; Consumption in kiloliters.</label><br><br></div>
<table id="table">
  <tr>
    <th>Date</th>
    <th>Reading</th>
    <th>Consumption</th>
  </tr>
  <?php 
  $count=-1;
  $amount= 0;
  $records = count($readings);
  if($records>0):
  foreach ($readings as $value): ?>
  <tr>
      <td><?php 
      $dateAsString = date_format($value[0], 'jS, F Y');
      echo $dateAsString;?>
      
      </td>
      <td><?php echo $value[1];?></td>
      <td><?php
      
      if($count===-1){
          if(!isset($opening_balance)){
          $todays = $value[1];
          $yesterdays = $value[1];
          echo $todays- $yesterdays;
          }else{
              echo $value[1] - $opening_balance;
          }
      }else{
          $todays = $value[1];        
          $yesterdays = $readings[$count][1];
          $amount+= $todays- $yesterdays;
          echo $todays- $yesterdays;
      }
      
      ?></td>
  </tr>
  <?php $count++;endforeach;?>
</table>
  <?php elseif($records<=0): ?>
  <p class="error"> You have <?php echo "$records";?> readings which aren't sufficient for us to generate a clear report for you.</p>
  <p class="error">Tasks to help: <a href="../Controller/MainController.php?action=add_reading">Add readings</a></p>
  <?php endif;?>
<br>
<label> <strong>Total water used:</strong></label>
<input type="text" disabled name="totWaterUsed" value="<?php echo "$amount";?>">
<input type="submit" value="Submit" class="registerbtn">
</div>
    
</div> 
<!--close box container div-->
    </form>
        </body>
</html>
