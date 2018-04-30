<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register on Driplit</title>
        <link rel="stylesheet" href="../Stylesheets/general.css">
        <script src="../Scripts/centrixScript.js"></script>
        <style>
            html{
                overflow-y: scroll;
                
            }
        </style>
    </head>
    <body class="bgRegister">
        <div class="limiter">
            <div class="login_container">
        <div class="r_main_content">
            <h1 class="login_title">Register to continue</h1>
            <label>Add more decorations here</label>
            
            <div class="basic_info">
                <input type="text" placeholder="Username" class="input_box_r"><br>
                <input type="text" placeholder="Email Address" class="input_box_r"><br>
                <input type="text" placeholder="Recovery Email Address" class="input_box_r"><br>
                <input type="password" placeholder="Password" class="input_box_r"><br>
                <input type="password" placeholder="Confirm Password" class="input_box_r"><br>
                <input type="text" placeholder="First Name" class="input_box_r"><br>
                <input type="text" placeholder="Last Name" class="input_box_r"><br>
                <input type="text" placeholder="Cell Number" class="input_box_r"><br>
                
                <!--make sure that below there are radio buttons that automatically activate the main or normal residents DIV tags - Catering for our different users-->
                <label>Are you a ?</label><br>
                <label><input type="radio" name="grpType" onclick="isMainResident()"> Home Guardian</label>
                
                 <label><input type="radio" name="grpType" checked="checked" onclick="isNormalResident()">Home Resident</label>
            </div>
            <div class="main_resident_info" id="main_resident">
                <input type="text" placeholder="Meter No" class="input_box_r"><br>
                <input type="" placeholder="Street Address" class="input_box_r"><br>
                <label>Pick your suburb from the list</label>
                <select>
                    <?php 
                    //PHP tag will automatically generate the content for the select
                    ?>
                </select> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            </div>
            <div class="register_btn_container">
                <input type="submit" value="Join" class="login_button">
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
