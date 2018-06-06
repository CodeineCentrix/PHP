<?php?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../Stylesheets/myStyles.css" type="text/css"/>
<script src="../Scripts/Scripts.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="MainRes" >
     
<form action="" method="post">
   <div class="MainRes">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
<!--    <span class="required">*</span>
-->	<label><b>Full Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" >
<!--    <span class="required">*</span>

	<label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" required>-->
    <span class="required">*</span>
	
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><span class="required">*</span>

    <label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="psw" id="psw"  required 
	pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
	title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
	<div id="message">
  <h4>Password must contain the following:</h4>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
	
	<span class="required">*</span>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat"required
	title="Must match above entered password">
	</br>
   
<!--   <span class="required">*</span>

	<label><b>Province</b></label>
    <select name="Provinces">
  <option value="">Eastern Cape</option>
  <option value="">Gauteng</option>
  <option value="">Mpumalanga</option>-->
  </select><span class="required">*</span>
	<label><b>City</b></label>
   <select name="Cities">
       <?php foreach ($cities as $city): ?>
       <option value="<?php echo "$city[0]"; ?>"> <?php echo"$city[1]";?> </option>  
  <?php endforeach; ?>
</select><span class="required">*</span>
	<label><b>Suburb</b></label>
 <select name="Suburbs"><span class="required">*</span>
     <?php foreach ($suburbs as $suburb):?>
     <option value="<?php echo "$suburb[0]";?>"> <?php echo "$suburb[1]"?> </option>
  <?php endforeach; ?>
  </select>
    <span class="required">*</span>
	<label><b>House Number</b></label>
    <input type="text" placeholder="Enter House Number" name="housenumber" required><span class="required">*</span>

   <label><b>Street Name</b></label>
    <input type="text" placeholder="Enter Street Name" name="streetname" required>
    <br>
<!--	<label name="cant be main"></label>-->
  
<!--Accordion*/-->
<input type="button" value="Register As Main Resident?" class="accordion"/>
	<!--<button class="accordion">Register As Main Resident?</button>-->
<div class="panel">
  <p>A Main Resident is a member of a household who must will be taking the sole responsibility 
     of recording water meter readings for that household on a regular basis (daily/weekly). 
     Main resident will act as a household manager, has full access to this site's utilities and
     can Add Residents under his/her household for statics and calculation purposes. 
     As a Main Resident we will need the number of residents within your household.</p>
  <input type="radio" id="ResType" name="ResType" value="mainRes" onclick="DisplayGroup()"> Main Resident<br><br>
 
 <div  id="MainResGrp" style="display:none">
<span class="required">*</span>
<label><b>Number of Residents</b></label>
    <input type="number" min="1" placeholder="Enter Number of Residents excl yourself" id="resident" name="residents"/>
	</div><!--end group-->
</div>
<input type="button" value="Register As Resident?" class="accordion"/>
	<div class="panel">
  <p>A Resident is a member of a household who belongs under a Main Resident's household
      (Read above for Main Resident definition) . As a resident you will not be responsible for
       recording water meter readings and thus need not fill the form to follow. On this site
       you have access to full utilities accept for: Adding Resident under yourself, Viewing Water Usage 
Reports and Recording Meter Readings.</p>
 <input type="radio" name="ResType" id="res" value="res" onclick="DisplayGroup()"> Resident<br>
  </div> <br><br>
  <input type="reset" value="Clear Form">
 <button type="submit" class="registerbtn" id="registerbtn">Register</button>
<br>
  </div>
  
  <div class="container signin">
    <button type="button" class="cancelbtn">Cancel</button> <span>Already have an account? <a href="#">Sign in</a>.</span>
  </div>
 </div>
 
 

</form>

  
</body>
</html>