<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Rates</title>
    </head>
    <body>
        
        <form action="../Controller/MainController.php?action=edit-rateCharge" method="post">
           <h2>Update Rates for state</h2>
           <table>
    <tr><th>Min</th><th>Max</th><th>Price</th></tr>
    <?php $count = 0; ?>
                        <?php foreach ( $rate as $rates):?>                                               
                        <tr>
                            <td><input type="number" step="any"  name="min<?php echo $count;?>" value="<?php echo $rates[1] ;?>"></td>
                            <td><input type="number" step="any" name="max<?php echo $count;?>" value="<?php echo $rates[2] ;?>"></td>
                            <td><input type="number" step="any"  name="price<?php echo $count;?>" value="<?php echo $rates[0] ;?>"></td>
                            
                            
                        </tr> 
                        <?php $count++; ?>
                        <?php endforeach;?>
                        <tr><td><input type="hidden" name="muniId" value="<?php echo $muniId;?>">
                                <input type="hidden" name="stateId" value="<?php echo $stateId;?>"></td>
                                
                            <td><input type="submit" value="Save Changes"></td></tr>
                           </table>
            </form>
    
    </body>
                 <script src="../Resources/Scripts/Scripts.js">
</html>
