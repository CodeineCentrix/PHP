<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Area Statistics </title>
        <script src="../Resources/Scripts/jquery.min.js"></script>
        <script src="../Resources/Scripts/jquery.easypiechart.min.js"></script>
    </head>
    <body>
     <?php include '../Resources/View/header.php'; ?>
        
        <div class="stats_content">
            
            <div class="same-line-holder">     
            <div class="same-line same-line-left">
                <h3>Your Location:</h3>
                <p><?php echo $addr_level[0][0]; ?></p>
                <br><br>
                <h3>Your Supplying Dam:</h3>
                <p><?php echo $addr_level[0][3]; ?></p>
            </div>
            
            
            
            
            
            <div class="same-line same-life-middle">
                
                    <li class="pr-chart-ctrl">
                        <h3>Current Dam Level</h3>
                        <div class="pr-chart" data-percent="<?php echo $addr_level[0][1]; ?>">
                            <p><?php echo $addr_level[0][1] ?>%</p>
                        </div>
                        
                    </li>
            
            </div>
               


            <div class=" same-line-right">
                <h3>View other area's</h3>
                <div class="area-holder">
               
                <form method="POST" action="MainController.php?action=area_stats_custom">
                <select name="areas">
                <?php foreach($surbs as $burbs): ?>
                    <option value="<?php echo "$burbs[0]";?>"><?php echo "$burbs[1]"; ?></option>
                   <?php endforeach;?>
                </select><br>
                <br>
                <input type="submit" value="View Area" class="registerbtn">
                </form>
                </div>
            </div>
        </div>
            
            
            
            <div class="area-charges-holder">
                <h2>Water Charges:</h2>
        <?php foreach($water_charges as $charge): ?>
                <p><?php echo "Price: R$charge[0]"; ?><span> | </span><?php echo " Min: $charge[1]kl"; ?><span> | </span><?php echo " Max: $charge[2]kl"; ?> </p>
        <?php endforeach; ?>
        </div>
            
        </div>
    </body>
</html>
