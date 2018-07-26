<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
        <script src="../Resources/Scripts/jquery.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Droplit</title>
        <style>
            p
            {
/*                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
                */
               font-size: 20px; 
            }
        </style>
        
        
    </head>
    <body>
        <!-- Floating action buttons-->
        <div class="tray">
            <div class=" info tray_item" onmouseover="show_info()" onmouseout="hide_info()"><img src="https://png.icons8.com/ios/50/000000/info.png"></div>
            <div class="tray_item" title="Login"><img src="https://png.icons8.com/ios/50/000000/login-rounded-right-filled.png"></div>
            <div class="tray_item" title="Register"><img src="https://png.icons8.com/ios/50/000000/edit-user-male-filled.png"></div>
        </div>
        <div class="content_holder">
 <div class="fullscreen-bg">
<img src="../Resources/Images/dropinhand.jpg" alt="Guy holding water" style="width:100%; height: 100%; opacity: 6;">
        </div>
   
<?php include '../Resources/View/header.php';?>

            

            <div class="middlise" style="padding: 0; height: 100% !important;">
                <div style="width: 100%;" class="middlise">
                    
                    <ul style="padding:0;" class="greetText">
                        <p><li>W  A  T  E  R</li></p>
                         <p><li>I  S</li></p>
                         <p><li>L  I  F  E</li></p>
                    </ul>
                        
    <div class="middlise">               
        <svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="200px" height="200px" viewBox="0 0 141.667 126.334" enable-background="new 0 0 141.667 126.334"
         xml:space="preserve">
                <g>
                <g>
            <path class="path" fill="none" stroke="#000" stroke-width="5" stroke-miterlimit="10" d="M126.274,15.18l-0.091-0.091
                c-13.42-13.42-35.517-13.08-49.354,0.756l-6.158,6.158l-6.159-6.159C50.677,2.006,28.579,1.669,15.158,15.088l-0.091,0.092
                C1.646,28.6,1.985,50.698,15.822,64.536l29.793,29.793c0.006,0.006,0.013,0.012,0.019,0.019l0.639,0.639
                c0.002,0.003,0.005,0.005,0.007,0.008l0.091,0.091c0.002,0.003,0.005,0.005,0.008,0.008l24.291,24.291l24.278-24.278
                c0.008-0.008,0.016-0.015,0.023-0.022l0.073-0.074l0.667-0.667c0.005-0.005,0.01-0.01,0.015-0.015l29.791-29.791
                C139.356,50.698,139.694,28.6,126.274,15.18z"/>
                </g>
                </g>
        </svg>
    </div>              
                    
                
                
                
            </div>
            <br><br><br><br>
            <div class="info_text">
            <strong> <p style="color:black;">This Water management web application is designed for individuals/businesses/homeowners<br>
	who wish to play their role in saving water, given the crisis we're facing of water shortages.<br>
	DripLit will inform you of your city's current water status, help you monitor, weigh, control <br>
        water consumption within your household and more importantly raise awareness.</p></strong>
            </div>
            <br>
        </div>            

        <script>$
            $document
            function show_info(){
                $('.info_text').css('display'​​​​​​​​​​​​​​​​​​​​​​​​​​​,'block');​​​​​​
            }
            
            function hide_info(){
                 $('.info_text').css('display'​​​​​​​​​​​​​​​​​​​​​​​​​​​,'none');​​​​​​
            }
        </script>
    </body>
</html>
