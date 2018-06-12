<?php?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php include '../Resources/View/base_header.php';?>
<body class="MainRes" >
    <?php if($feedback >0):?>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
<!--    <span class="close">&times;</span>-->
	<div class="mid">
	<img src="../Resources/Images/success.png">
    <strong><h3 class="modalText">Registration Successful</h3></strong>
	<div class="btnProceed"><a href= "../Controller/MainController.php?action=login_page">OK</a></div>
	</div>
  </div>

</div>
 <?php endif;?>

 
<form action="MainController.php?action=register_resident" method="post">
     
    
   <div class="MainRes">
    <p>Please fill in this form to create an account.</p>
    <hr>

	<label><b>Full Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" required>
    <span class="required">*</span>
	
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <?php if($exists == TRUE):?>
    <label id="res3">
    <img src="../Resources/Images/information.PNG">The entered email <?php echo "'$email'"; ?> already exists. Try: 
    <a href="../Controller/MainController.php?action=login_page">Logging in</a></label><br><br><br>
    
    <?php endif;?>
  <span class="required" autofocus >*</span>
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
    <input type="password" placeholder="Repeat Password" onblur="ComparePassword()" name="psw-repeat" id="psw2"required
           title="Must match above entered password">
    <img style="float: right;" class="click" src="../Resources/Images/eye.png" alt="Show password"  title="Show password" onclick="ShowPassword()">
 	<label id="res2"><img src="../Resources/Images/information.PNG">&nbsp;Entered passwords do not match.</label>

	</br>
   

  </select><span class="required">*</span>
	<label><b>City</b></label>
   <select name="Cities"  onclick="ComparePassword()">
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
    <input type="number" placeholder="Enter House Number" name="housenumber" required><span class="required">*</span>

   <label><b>Street Name</b></label>
    <input type="text" placeholder="Enter Street Name" name="streetname" required>
	<br>
       
  
<!--Accordion*/-->
<input type="button" value="Register As Main Resident?" class="accordion"/>
	<!--<button class="accordion">Register As Main Resident?</button>-->
<div class="panel">
  <p>A Main Resident is a member of a household who must will be taking the sole responsibility 
     of recording water meter readings for that household on a regular basis (own discretion). 
     Main resident will act as a household manager, has full access to this site's utilities and
     can Add Residents under his/her household for statics and calculation purposes. 
     As a Main Resident we will need the number of residents within your household.</p>
  <input type="radio" id="ResType" required name="ResType" value="mainRes" required onclick="DisplayGroup()" required> Main Resident<br><br>
 
 <div  id="MainResGrp" style="display:none">
<span class="required">*</span>
<label><b>Number of Residents</b></label>
    <input type="number" min="1" placeholder="Enter Number of Residents incl yourself" id="resident" name="residents"/>
	</div><!--end group-->
</div>
<input type="button" value="Register As Resident?" class="accordion"/>
	<div class="panel">
  <p>A Resident is a member of a household who belongs under a Main Resident's household
      (Read above for Main Resident definition) . As a resident you will not be responsible for
       recording water meter readings and thus need not fill the form to follow. On this site
       you have access to full utilities accept for: Adding Resident under yourself, Viewing Water Usage 
Reports and Recording Meter Readings.</p>
  <input type="radio" name="ResType" id="res" value="res" required onclick="DisplayGroup()" required> Resident<br>
  </div> <br><br>
  <input type="reset" value="Clear Form">
 <button type="submit" class="registerbtn" id="registerbtn">Register</button>
<br>
    <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>

  </div>
  
  <div class="container signin">
<!--    <button type="button" class="cancelbtn">Cancel</button>-->
    
    <span>Already have an account? <a href="../Controller/MainController.php?action=login_page">Sign in</a>.</span>
  </div>
 </div>
 

</form>

  <script src="../Resources/Scripts/Scripts.js"></script>
</body>
</html>
