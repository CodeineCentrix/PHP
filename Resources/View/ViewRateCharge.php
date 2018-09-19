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
        
        <title>View Rate Charge</title>
    </head>
    <body>
        <h2>View Rate Charge</h2>
                     <form action="../Controller/MainController.php?action=edit-rateCharge-page" method="post"> 

            <table>
                <tr><th>Municipality</th><th>State</th>
               </tr>
                <tr><td><select name="muniId">
        <?php foreach ($municipalities as $municipality):?>
        <option value="<?php echo "$municipality[0]";?>"> <?php echo "$municipality[3]";?></option>
    <?php endforeach; ?>
            </select></td>
              <td><select name="stateId" >
            <?php foreach ($state as $st):?>
                        <option  value="<?php echo $st[0]; ?>" ><?php echo $st[1];?></option>
            <?php endforeach;?>
                </select></td>
            <td>  <input type="submit" value="Search"></td></tr>
            </table>
                         </form>                      
    </body>
             <script src="../Resources/Scripts/Scripts.js">
</html>
