<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/animate.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/toast.css">
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
        
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $( document ).ready(function() {
      //  $('.info_text').hide();
        
        $( ".info" ).mouseover(function() {
        $('.info_text').show();
     });
            
        $( ".info" ).mouseout(function() {
        $('.info_text').hide();
    });
    });
    </script>
    </head>
    <body>
        <!-- Floating action buttons-->
<!--        <div class="tray">
            <div><img class="info" src="../Resources/Images/info.png" width="80px"></div>
            <a href="?action=login_page"> <div class="" title="Login"><img src="../Resources/Images/login_1.png" width="80px"></div></a>
            <a href="?action=register_page"><div class="" title="Register"><img src="../Resources/Images/registers.png" width="80px"></div></a>
        </div>-->
        
        <div class="content_holder">
 <div class="fullscreen-bg">
<img src="../Resources/Images/dropinhand.jpg" alt="Guy holding water" style="width:100%; height: 100%; opacity: 6;">
        </div>
   
<?php include '../Resources/View/header.php';?>

            <div class="content_holder">
                 <div class="container">
                    <div class="seperator">   
                    <ul class="greetText">
                        <p><li>W  A  T  E  R</li></p>
                         <p><li>I  S</li></p>
                         <p><li>L  I  F  E</li></p>
                    </ul>
                    </div>
                     <div class="seperator">       
                      <svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="200px" height="200px" viewBox="0 0 141.667 126.334" enable-background="new 0 0 141.667 126.334"
         xml:space="preserve">
                <g>
                <g>
            <path class="path" fill="none" stroke="#660000" stroke-width="5" stroke-miterlimit="10" d="M126.274,15.18l-0.091-0.091
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
            </div>
  
            
           <div class="info_text">
            <strong> <p>This Water management web application is designed for individuals/businesses/homeowners<br>
	who wish to play their role in saving water, given the crisis we're facing of water shortages.<br>
	DripLit will inform you of your city's current water status, help you monitor, weigh, control <br>
        water consumption within your household and more importantly raise awareness.</p></strong>
            </div>
            <script src="../Resources/Scripts/toast.js"></script>
            <div  id="l1" onclick="toast('l1', '5000')">You aren't logged in. Unregistered activities are on the menu bar(Top Left)</div>
            <div id="l2" onclick="toast('l2', '5000')">You're logged in. The Menu options are on the Top left corner</div>
            <script>
                //Make the toast appear
                <?php if(!isset($_SESSION['email'])):?>
               document.getElementById('l1').click();
               <?php else: ?>
                document.getElementById('l2').click();   
               <?php endif;?>
               //Animate the menu to come in 
               $('icon-menu').toggleClass('clicked');
               $('menu').toggleClass('clicked');
                $('.drawer').toggleClass('clicked');
                $('.link_con').toggleClass('clicked');
                $('.card').toggleClass('clicked');
                
                
                //Make the hamburger icon appear as if they have just been clicked
                
                $('.line').toggleClass('active');
                $('.line--2').toggleClass('clicked');
                $('.line--1').toggleClass('clicked');
                $('.line--3').toggleClass('clicked');
            </script>
             
        </body>
</html>
