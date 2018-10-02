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
        <link rel="stylesheet" href="../Resources/Stylesheets/snackbarlight.css">
        <script src="../Resources/Scripts/jquery.easypiechart.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
     <?php include '../Resources/View/header.php'; ?>
        <!-- snackbar-->
        <span id="hh" data-toggle=snackbar data-content="Need help understanding this page?" data-timeout="60000" data-link="Get Help" data-url="?action="></span>
        <script src="../Resources/Scripts/snackbarlight.js"></script>
        <script>
        document.getElementById('hh').click();
        </script>
        
        
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
                  <h2>How you're charged for your water usage in area</h2>
                
        <?php 
		$i = 0;
		foreach($water_charges as $charge): ?>
				<?php if($i === 0): ?>
                <h2>Normal state charges: </h2>
                <div style="overflow: hidden; float: left;width: 90%;">
                    <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i][0]; ?> <span> from </span><?php echo $water_charges[$i][1]."kl "; ?><span> till </span><?php echo  $water_charges[$i][2]."kl"; ?> </span>
                &nbsp;&nbsp;
                <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+1][0]; ?><span> from </span><?php echo $water_charges[$i+1][1]."kl"; ?><span> till </span><?php echo $water_charges[$i+1][2]."kl"; ?> </span>
                &nbsp;&nbsp;
                <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+2][0]; ?><span> from </span><?php echo $water_charges[$i+2][1]."kl"; ?><span> till </span><i class="fas fa-infinity"></i></span>
                </div><br>           
                <?php elseif($i === 3): ?>
                
                    <h2>Shortage state charges:</h2>
                <div style="overflow: hidden; float: left;width: 90%;">
                <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i][0]; ?> <span> from </span><?php echo $water_charges[$i][1]."kl "; ?><span> till </span><?php echo  $water_charges[$i][2]."kl"; ?> </span>
                &nbsp;&nbsp;
                <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+1][0]; ?><span> from </span><?php echo $water_charges[$i+1][1]."kl"; ?><span> till </span><?php echo $water_charges[$i+1][2]."kl"; ?> </span>
                &nbsp;&nbsp;
                <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+2][0]; ?><span> from </span><?php echo $water_charges[$i+2][1]."kl"; ?><span> till </span><i class="fas fa-infinity"></i></span>
                </div><br>
                
                                <?php elseif($i === 6): ?>
                    <h2>Emergency state charges:</h2>
                    <div style="overflow: hidden; float: left;width: 90%;">
                    <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i][0]; ?> <span> from </span><?php echo $water_charges[$i][1]."kl "; ?><span> till </span><?php echo  $water_charges[$i][2]."kl"; ?> </span>
                    &nbsp;&nbsp;
                    <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+1][0]; ?><span> from </span><?php echo $water_charges[$i+1][1]."kl"; ?><span> till </span><?php echo $water_charges[$i+1][2]."kl"; ?> </span>
                    &nbsp;&nbsp;
                    <span><i class="fa fa-arrow-right"></i><?php echo "R".$water_charges[$i+2][0]; ?><span> from </span><?php echo $water_charges[$i+2][1]."kl"; ?><span> till </span><i class="fas fa-infinity"></i></span>
                    </div>
                                <?php endif; 
                                ?>
        <?php 
        $i++;
		endforeach; ?>
                
                <p class="warning-red ">*Note* Prices are in Rands. 1 Kilo-liter(Kl) is a 1000 liters.   </p>
        </div>
            
        </div>
    </body>
</html>
