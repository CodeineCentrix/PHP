
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
  <link rel="icon" href="../Resources/Images/companylogo.ico" type="image/gif">      
 <link rel="stylesheet" href="../Resources/Stylesheets/snackbarlight.css">       
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="recordReadings" >
       <?php include '../Resources/View/header.php'; ?>
    <div class="MainRes">
        <form action="MainController.php?action=view_readings" method="post">
<!--      <h1>View Water Readings</h1>-->
      
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
     <span class="required">*</span>
   <label> <strong>From:</strong></label>
   <input type="date" required name="fromDate">
    <span class="required">*</span>
  <label> <strong>To:</strong></label>
  <input type="date" required name="toDate">
  <div class="warning"><br><label>Readings &amp; Consumption in kiloliters.</label><br><br></div>  <br>

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
        if ($value[2]==NULL) {
            echo 0;
        }else{
            echo $value[2];
            $amount += $value[2];
        }
      ?></td>
  </tr>
  <?php $count++;endforeach;?>
</table>
  <?php elseif($records<=0): ?>
  <p class="error"> You have <?php echo "$records";?> readings which aren't sufficient for us to generate a clear report for you.</p>
  <?php if(!isset($_SESSION['MainResidentID'])):?>
  <strong><p class="error">Tasks to help: Tell Main Resident to record meter readings for the selected date range.</p></strong>
  <?php else: ?>
  <strong><p class="error">Tasks to help: <a href="../Controller/MainController.php?action=add_reading">Add readings</a></p></strong>
  <?php endif; ?>
  <?php endif;?>
<br>
<label> <strong>Total water used:</strong></label>
<input type="text" disabled name="totWaterUsed" value="<?php echo "$amount";?>">
<input type="submit" value="Submit" class="registerbtn">
</div>
        <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>

</div> 
<!--close box container div-->
    </form>
        
        <!-- snackbar-->
       <span id="hh" data-toggle=snackbar data-content="Need help understanding this page?" data-timeout="60000" data-link="Get Help" data-url="?action=help&q=vMR"></span>
       <script src="../Resources/Scripts/snackbarlight.js"></script>
       <script>
       document.getElementById('hh').click();
       </script>
</body>
</html>
