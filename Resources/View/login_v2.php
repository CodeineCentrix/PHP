<html>
<head>
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="boot_test.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="test_boot.js"></script>
<link rel="stylesheet" href="myStyles.css" type="text/css"/>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<!-- BEGIN # MODAL LOGIN -->
		<span class="login_region"> 
    	<div class="modal-dialog">
			<div class="modal-content">
				<div style="background-color: 330066;" class="modal-header" align="center">
					<img  class="" id="img_logo" src="companylogo.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form">
		                <div class="modal-body">
				    		<br><div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type in your username &amp; password to login</span>
                            </div><br><br>
							<label>Email</label><br>
				    		<input id="login_username" class="form-control" type="text" name= "email" placeholder="Enter Email Address" required>
							<br>
							<label>Password</label>
				    		<input id="login_password" class="form-control" name="password" type="password" placeholder="Password" required>
        		    	</div>
						<img class="click" src="../Resources/Images/eye.png" alt="Show password"  title="Show password" onclick="ShowPassword()">
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
				    	    <div>
                                <i id="login_register_btn" href="blah" type="button" class="btn btn-link">Register</i>
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
	