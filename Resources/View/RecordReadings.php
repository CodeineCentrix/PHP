<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>Record Meter Readings
</title>

<link rel="stylesheet" href="../Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="MainRes">
<div class="MainRes">
<main>
<h1>Record Meter Readings</h1>

<h2 class="displayInfoToUser">Mkhwanazis' Residence</h2>

<iframe id="iframe" src="../Images/gauge.png" name="iframe_a"></iframe><br>
<a href="meterReadingHelp.html" target="iframe_a">Help me read my meter?</a>


<form action="" method="post">
    <br>
<span class="required">*</span>

<label> <strong>Date:</strong></label><br><br>
<input type="date" name="readingDate" required ><span class="required">*</span>

<label> <strong>Reading:</strong></label><br>
<input type="text" maxlength="5" required>

<input type="reset" value="Clear Form">  &nbsp;&nbsp;<button type="button" class="cancelbtn">Cancel</button>
<input type="submit" name="submitReadings" value="Submit" class="registerbtn">

  </div>
</form> 

</main>
</body>
</html>