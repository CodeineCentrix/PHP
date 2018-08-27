<?php?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css">
<link rel="stylesheet" href="../Resources/Stylesheets/general.css" type="text/css">
<script src="../Resources/Scripts/Scripts.js"></script>
</head>
<body class="recordReadings" >
    <?php include '../Resources/View/base_header.php';?>
    <div class="MainRes">
    <form action="MainController.php?action=login" method="post" >
  
<!--    <h1>Resident Login</h1>-->
    
    
    <p>Please fill in form to login.</p><hr>
    <?php  
     if($user_details===FALSE): ?>
    <p class="error">   <?php echo "Password or username incorrect, please try again.";?> </p>
    <?php elseif($user_details==1):?>
    <p class="error"><?php echo "Please login, to continue your activity";?></p>
    <?php endif;?>
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><span class="required" autofocus>*</span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
	<img class="click" src="../Resources/Images/eye.png" alt="Show password"  title="Show password" onclick="ShowPassword()">
        <input type="submit" class="registerbtn" value="Login">
<!--	 <label>
      <input type="checkbox" name="remember"> Remember me
    </label>-->
      <label class="required" style="font-size: small">All required fields marked with a red <strong>*</strong></label>

   <div class="container signin">
       <a href="MainController.php?action=register_page">Register?</a>
<!--    <button type="button" class="cancelbtn">Cancel</button> <span>&nbsp;&nbsp;&nbsp;&nbsp;Forgot <a href="#">Username/Password? </a></span>-->
  </div>
    </div>
  </form>
  
  
 
</body>
</html>