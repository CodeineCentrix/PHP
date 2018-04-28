<!DOCTYPE html>
<!--
How about we use this page for logging in and registering?? The reason being is that we want to destroy or limit the creation of 
too many pages, we can rename this file name to something that will incorporate both the log in and registering process. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login to Driplit</title>
        <link rel="stylesheet" href="../Stylesheets/general.css">
    </head>
    <body class="bgLogin">
        <div class="limiter">
            <div class="login_container"> 
        <div class="login_content">
        <div class="login_pic">
            <img src="../Images/complogo.png" alt="IMG" height="400"width="400">
        </div>
        <form class="login_form">
                <span class="login_title">
                        Member Login
                </span>

                <div class="login_input" validate="Provide a valid username with a '@' ">
                        <input class="input_box" type="text" name="email" placeholder="Email">
                </div>

                <div class="login_input">
                        <input class="input_box" type="password" name="pass" placeholder="Password">
                </div>

                <div class="login_button_con">
                    <input type="submit" value="Login" class="login_button">
                </div>

                <div class="text-center p-t-12">
                        <span class="txt1">
                                Forgot
                        </span>
                        <a class="txt2" href="#">
                                Username / Password?
                        </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="../View/Register.php">
                                Create your Account
                                <i><img src="../Images/right-arrow.png" alt="---->" width="15" height="15"></i>
                        </a>
                </div>
        </form>
        </div>
        </div>
        </div>
    
    </body>
</html>
