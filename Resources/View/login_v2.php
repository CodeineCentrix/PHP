<html>
<head>
<link href="../Resources/Stylesheets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../Resources/Stylesheets/boot_test.css" rel="stylesheet">
<link href="../Resources/Stylesheets/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css">
<link rel="stylesheet" href="../Resources/Stylesheets/general.css" type="text/css">
<script src="../Resources/Scripts/jquery-3.3.1.min.js"></script>
<link rel="icon" href="../Resources/Images/companylogo.ico" type="image/gif">
<script src="../Resources/Scripts/centrixScript.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Login</title>
</head>
<body>

<!-- BEGIN # MODAL LOGIN -->
		<span class="login_region"> 
    	<div class="modal-dialog">
			<div class="modal-content">
				<div style="background-color:#264d73;" class="modal-header" align="center">
					<img  class="" id="img_logo" src="../Resources/Images/companylogo.png">
					
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" action="MainController.php?action=login" method="post">
		                <div class="modal-body">
				    		<br><div id="div-login-msg">
                                <div id="icon-login-msg" class="fa fa-info-circle"></div>
                                <span id="text-login-msg">Type in your username &amp; password to login</span>
                            </div><br><br>
                        <?php  
                         if($user_details===FALSE): ?>
                        <p class="error">   <?php echo "Password or username incorrect, please try again.";?> </p>
                        <?php elseif($user_details==1):?>
                        <p class="error"><?php echo "Please login, to continue your activity";?></p>
                        <?php endif;?>
                        
                                <label>Email</label><br>
                        <input  class="form-control" type="email" name= "email" placeholder="Enter Email Address" required>
                                <br>
                                <label>Password</label>
                                <input class="form-control" id="psw" name="password" type="password" placeholder="Password" required>
                                </div>
                        <img class="click" src="../Resources/Images/eye.png" alt="Show password"  title="Show password" onclick="ShowPassword()">
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="registerbtn" id="loginbtn">Login</button> <a href="?action=">Cancel</a>
                            </div>
                            <div>
                                <a href="?action=register_page"><i id="login_register_btn"  type="button" class="btn btn-link">Register</i></a>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->

                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
		</span>
	
    <!-- END # MODAL LOGIN -->
	</body>
	</html>
	