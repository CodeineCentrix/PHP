<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<!--<title>Record Meter Readings
</title>-->

<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
 <script src="../Resources/Scripts/Scripts.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="MainRes">
    <?php include '../Resources/View/header.php'; ?>
<div class="MainRes">
<main>

<h2 class="displayInfoToUser"><?php echo "$house[0]"." $house[1]"; ?></h2>

<iframe id="iframe" src="../Resources/Images/gauge.png" name="iframe_a"></iframe><br>
<a href="../Resources//View/meterReadingHelp.html" target="iframe_a">Help me read my meter?</a>


<form action="MainController.php?action=add_reading" method="post">
    <br>
<span class="required">*</span>

<label> <strong>Date:</strong></label><br><br>
<input type="date" title="You cannot select a date later than today." name="readingDate" max="<?php echo date("Y-m-d")?>" required ><span class="required">*</span>

<label> <strong>Reading:</strong></label><br>
<input type="number" maxlength="5" id="reading" name="reading" required title="Must be a 5 numbers field">
<?php if($feedback>0):?>
    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   
	<div class="mid">
	<img src="../Resources/Images/success.png">
    <strong><h3 class="modalText">Meter Reading Recorded</h3></strong>
	<div class="btnProceed"><a href= "../Controller/MainController.php?action=reading_page">OK</a></div>
	</div>
  </div>

</div>
     <?php elseif(isset($feedback)===0):?>
    <p class="error"><?php echo 'Unable to add reading please try again';?></p>
<?php endif; ?>
<input type="reset" value="Clear Form">  &nbsp;&nbsp;<!--<button type="button" class="cancelbtn">Cancel</button>-->
<input type="submit" name="submitReadings" value="Submit" onclick="ValidateReading()" class="registerbtn">
    <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>

  </div>
</form> 

</main>
</body>
</html>
