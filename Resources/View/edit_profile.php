<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
        <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css">
        <link rel="stylesheet" href="../Resources/Stylesheets/general.css" type="text/css">
        <script src="../Resources/Scripts/jquery-3.3.1.min.js"></script>
        <script src="../Resources/Scripts/centrixScript.js"></script>
    </head>
    <body>
        <div>
            <?php include '../Resources/View/header.php';?>
        </div>
           <?php if($feedback >0):?>
        <!-- The Modal -->
       <div id="myModal" class="modal">

         <!-- Modal content -->
         <div class="modal-content">
       <!--    <span class="close">&times;</span>-->
               <div class="mid">
               <img src="../Resources/Images/success.png">
           <strong><h3 class="modalText">Update Successful</h3></strong>
               <div class="btnProceed"><a href= "../Controller/MainController.php?action=login_page">OK</a></div>
               </div>
         </div>

       </div>
        <?php endif;?>

        <div class="edit_profile">
            <h1>Edit your profile</h1>
            <form method="POST" action="?action=edit_profile">
    <label><b>Full Name</b></label>
    <input type="text" placeholder="Enter full Name" name="lastname" required value="<?php if(isset($_SESSION["FullName"])){ echo trim($_SESSION["FullName"]) ;} ?>">
    <span class="required">*</span>
	
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required readonly value="<?php if(isset($_SESSION["Email"])){ echo trim($_SESSION["Email"]) ;} ?>">
    <?php if($exists == TRUE):?>
    <label id="res3">
    <img src="../Resources/Images/information.PNG">The entered email <?php echo "'$email'"; ?> already exists. Try: 
    <a href="../Controller/MainController.php?action=login_page">Logging in</a></label><br><br><br>
    
    <?php endif;?>
  <span class="required" autofocus >*</span>
  
    <label for="psw"><b>Old Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw"  required value="<?php if(isset($_SESSION["UserPassword"])){ echo trim($_SESSION["UserPassword"]) ;} ?>"
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
           title="Must match above entered password" value="<?php if(isset($_SESSION["UserPassword"])){ echo trim($_SESSION["UserPassword"]) ;} ?>">
    <img style="float: right;" class="click" src="../Resources/Images/eye.png" alt="Show password"  title="Show password" onclick="ShowPassword()">
 	<label id="res2"><img src="../Resources/Images/information.PNG">&nbsp;Entered passwords do not match.</label>

	<br>
        <label>Check to change address
            <input type="checkbox" name="change_address" id="changeAdd" onclick="UnblockAddresses()"> </label><br>
            <span class="error">Note: Changing addresses will revoke rights and all data related to your current house. </span><br>
<!--  </select><span class="required">*</span>-->
	<label><b>City</b></label>
        <select name="Cities" disabled id="cities" onclick="ComparePassword()" onblur="CheckMainResidence()">
       <?php foreach ($cities as $city): ?>
       <option value="<?php echo "$city[0]"; ?>"  <?php if(trim($_SESSION["CityID"])===trim($city[0])){echo 'selected';} ?> > <?php echo"$city[1]";?> </option>  
  <?php endforeach; ?>
</select><span class="required">*</span>
	<label><b>Suburb</b></label>
<select name="Suburbs" id="suburbs" disabled onblur="CheckMainResidence()"><span class="required">*</span>
     <?php foreach ($suburbs as $suburb):?>
     <option value="<?php echo "$suburb[0]";?>" <?php if(trim($_SESSION["SurburbID"])===trim($suburb[0])){echo 'selected';} ?> > <?php echo "$suburb[1]"?> </option>
  <?php endforeach; ?>
  </select>
    <span class="required">*</span>
	<label><b>House Number</b></label>
    <input onblur="CheckMainResidence()" type="text" id="houseNUm" disabled placeholder="Enter House Number" name="housenumber" required value="<?php if(isset($_SESSION["HouseNumber"])){ echo $_SESSION["HouseNumber"] ;} ?>"><span class="required" >*</span>

   <label><b>Street Name</b></label>
   <input onblur="CheckMainResidence()" id="strName" type="text" placeholder="Enter Street Name" name="streetname" value="<?php if(isset($_SESSION["StreetName"])){ echo $_SESSION["StreetName"] ;} ?>" required>
	<br>
       
  
<!--Accordion*/-->
<input type="button" value="Become a Main Resident?" class="accordion">
	<!--<button class="accordion">Register As Main Resident?</button>-->
<div class="panel">
  <p>A Main Resident is a member of a household who must will be taking the sole responsibility 
     of recording water meter readings for that household on a regular basis (own discretion). 
     Main resident will act as a household manager, has full access to this site's utilities and
     can Add Residents under his/her household for statics and calculation purposes. 
     As a Main Resident we will need the number of residents within your household.</p>
  <input type="radio" disabled id="ResType" required name="ResType" value="mainRes" required onclick="DisplayGroup()" required> Main Resident<br><br>
  <p id="who" class="error"></p>
 <div  id="MainResGrp" style="display:none">
<span class="required">*</span>
<label><b>Number of Residents</b></label>
    <input type="number" min="1" placeholder="Enter Number of Residents incl yourself" id="resident" name="residents" value="<?php if(isset($_SESSION["NumberOfResidents"])){ echo $_SESSION["NumberOfResidents"] ;} ?>" >
	</div><!--end group-->
</div>
<input type="button" value="Become a Resident?" class="accordion">
	<div class="panel">
  <p>A Resident is a member of a household who belongs under a Main Resident's household
      (Read above for Main Resident definition) . As a resident you will not be responsible for
       recording water meter readings and thus need not fill the form to follow. On this site
       you have access to full utilities accept for: Adding Resident under yourself, Viewing Water Usage 
Reports and Recording Meter Readings.</p>
  <input type="radio" name="ResType" id="res" value="res" required onclick="DisplayGroup()" required> Resident<br>
  </div> <br><br>
  <input type="reset" value="Clear Form">
  <input type="submit" class="registerbtn" id="registerbtn" value="Update Profile">
<br>
    <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>

  </div>
</form>
    </div>
    <script src="../Resources/Scripts/Scripts.js"></script>
</body>
</html>
