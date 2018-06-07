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
           
            <div class="same-line">
                <h3>Your Location</h3>
                <p><?php echo $addr_level[0][0]; ?></p>
            </div>
            
            <div class="same-line">
                <ul>
                    <li class="pr-chart-ctrl"> <div class="pr-chart" data-percent="<?php echo $addr_level[0][1]; ?>"></li>
                <i></i>
            </div>
                </ul>
            <p>Your Dam level</p>

            </div>
            
            <div class="same-line">
                <h5>View other area's</h5>
                <form method="POST" action="MainController.php?action=other_areas">
                <select name="areas">
                <?php foreach($surbs as $burbs): ?>
                    <option value="<?php echo "$burbs[0]";?>"><?php echo "$burbs[1]"; ?></option>
                   <?php endforeach;?>
                </select>
                    <input type="submit" value="View Area">
                </form>
            </div>
            
            <div style="width: 50%;">
        <?php foreach($water_charges as $charge): ?>
        <p><?php echo "$charge[0]"; ?><span></span><?php echo "$charge[1]"; ?><span></span><?php echo "$charge[2]"; ?> </p>
        <?php endforeach; ?>
        </div>
            
        </div>
    </body>
</html>
