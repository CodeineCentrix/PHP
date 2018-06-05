<?php?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../Stylesheets/myStyles.css" type="text/css"/>
</head>
<body class="recordReadings" >
    <div class="MainRes">
<form action="" method="post">
  
    <h1>Resident Login</h1>
    <p>Please fill in form to login.</p><hr>
<!--    <span class="required">*</span>
	<label><b>User Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required><span class="required">*</span>-->

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><span class="required">*</span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" required>
	<img class="click" src="../Images/eye.png" alt="Show password"  title="Show password"onclick="ShowPassword()">
	

	
	 <button type="submit" class="registerbtn">Login</button>
	 <label>
      <input type="checkbox" name="remember"> Remember me
    </label>
  
   <div class="container signin">
    <button type="button" class="cancelbtn">Cancel</button> <span>&nbsp&nbsp&nbsp&nbspForgot <a href="#">Username/Password? </a></span>
  </div>
    </div>
  </form>
  
  <script src="../Scripts/Scripts.js"></script>
 
</body>
</html>