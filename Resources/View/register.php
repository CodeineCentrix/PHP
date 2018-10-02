<html>
<head>
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link href="../Resources/Stylesheets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../Resources/Stylesheets/boot_test.css" rel="stylesheet">
<link rel="../Resources/Stylesheets/stylesheet" href="myStyles.css" type="text/css"/>
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
<link rel="icon" href="../Resources/Images/companylogo.ico" type="image/gif">
<title>Register</title>

<!------ Include the above in your HEAD tag ---------->
</head>
<body>
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
 
 
<!-- BEGIN # MODAL LOGIN -->
<div class="reg_master">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div style="background-color:#264d73;" class="modal-header" align="center">
					<img  class="" id="img_logo" src="../Resources/Images/companylogo.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form action="MainController.php?action=register_resident" method="post">
		                <div class="modal-body">
				    		<br><div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Fill in the form to create an account</span>
                            </div><br><br>
							<label><b>Full Name</b></label>
							<input type="text" placeholder="Enter Last Name" name="lastname" required>
							<span class="required">*</span>
							
							<label><b>Email</b></label>
							<input type="email" placeholder="Enter Email" name="email" required><br>
							<span class="required" autofocus >*</span>
                                                        <?php if($exists == TRUE):?>
                                                        <label id="res3">
                                                        <img src="../Resources/Images/information.PNG">The entered email <?php echo "'$email'"; ?> already exists. Try: 
                                                        <a href="../Controller/MainController.php?action=login_page">Logging in</a></label><br><br><br>
                                                        <?php endif;?>
                                                        
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
							<input type="text" placeholder="Enter House Number" name="housenumber" required><span class="required">*</span>

						   <label><b>Street Name</b></label>
							<input type="text" placeholder="Enter Street Name" name="streetname" required>
							<br>
                                                        <span class="required">*</span><label><b>Pick the type of resident you are</b></label><br>
  
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
							 
                                        </div>
                        <br><label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label><br>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="registerbtn" id="registerbtn">Register</button>  <a href="?action=">Cancel</a>
                                
                            </div>
				    	    <div>
                                                <a href="?action=login_page"><i id="login_register_btn"type="button" class="btn btn-link">I already have an account </i></a>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->

                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
</div>
	<script src="../Resources/Scripts/Scripts.js"></script>
    <!-- END # MODAL LOGIN -->
	</body>
	</html>
	